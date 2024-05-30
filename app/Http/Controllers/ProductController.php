<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    private $category;
    public function __construct(Category $category,)
    {
        $this->category=$category;
    }
    public function getCategories($parent_id)
   {
       $data = $this->category->all();
       $recusive = new Recusive($data);
       $option = $recusive->categoryRecusive($parent_id);
       return $option;
   }
    public function index()
    {   
        $products = Product::with('category')->paginate(4);

        $images = ProductImage::where('image_type',0)->get();
        return view('admin.product.index',compact('products','images'));
    }
    public function create()
    {
        $option= $this->getCategories($parent_id='');
        return View('admin.product.create',['option'=>$option]);
    }
    public function store(Request $request)
    {
        
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->longdescription = $request->longdescription;
        $product->category_id = $request->category_id;
        $product->save();
        
        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('image/product'), $imageName);
            $url ='image/product/'.$imageName;
            $productimage = new ProductImage();
            $productimage->url =  $url;
            $productimage->product_id =  $product->id;
            $productimage->save();
        }
        if ($request->hasFile('image_detail')){
            $stt=1;
            foreach($request->file('image_detail') as $image){
                $imageName = time().'_'.$stt.'.'.$image->extension();  
                $image->move(public_path('image/product'), $imageName);
                $url ='image/product/'.$imageName;
                $productimage = new ProductImage();
                $productimage->url =  $url;
                $productimage->product_id =  $product->id;
                $productimage->image_type =  1;
                $productimage->save();
                $stt++;
            }
        }
        return redirect()->route('product.index');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $option= $this->getCategories($product->category_id);
        return View('admin.product.edit',['option'=>$option,'product'=>$product]);
    }
    public function update($id,Request $request){
        $product = Product::findOrFail($id);

        // Xóa ảnh cũ nếu có
        if ($request->hasFile('image') && $product->image) {
            unlink('image/product/'.$product->image);
        }

        // Lưu ảnh mới
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('image/product'), $imageName);
        }else{
            $imageName = $product->image;
        }

        // Cập nhật thông tin sản phẩm khác
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'longdescription' => $request->longdescription,
            'category_id' => $request->category_id,
            'image' => $imageName
        ]);
        return redirect()->route('product.index');
    }
    public function delete($id){
        $product = Product::find($id);
        unlink('image/product/'.$product->image);
        $product->delete();
        return redirect()->route('product.index');
    }
    
}
