<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    private $category;
    private $brand;

    public function __construct(Category $category,Brand $brand)
    {
        $this->category=$category;
        $this->brand=$brand;

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
        $brands = $this->brand->all();
        $option= $this->getCategories($parent_id='');
        return View('admin.product.create',['option'=>$option,'brands'=>$brands]);
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
        $product->brand_id = $request->brand_id;
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
        $brands = $this->brand->all();
        $image = ProductImage::where('image_type',0)
        ->where('product_id',$id)
        ->first();
        $product = Product::find($id);
        $option= $this->getCategories($product->category_id);
        return View('admin.product.edit',['option'=>$option,'product'=>$product,'image'=>$image,'brands'=>$brands]);
    }
    public function update($id,Request $request){
        $product = Product::findOrFail($id);
        $image = ProductImage::where('product_id',$id)
        ->where('image_type',0)
        ->first();
       
        if($image!=null){
            if ($request->hasFile('image') ) {
                 // Xóa ảnh cũ nếu có
                unlink($image->url);
                // Lưu ảnh mới
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('image/product'), $imageName);
                $url ='image/product/'.$imageName;
                $image->update([
                    'url'=>$url
                ]);
            }
            
        }
        

        

        // Cập nhật thông tin sản phẩm khác
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'longdescription' => $request->longdescription,
            'category_id' => $request->category_id,
            'brand_id'=>$request->brand_id,
        ]);
        return redirect()->route('product.index');
    }
    public function delete($id){
        $images = ProductImage::where('product_id',$id)->get();
        foreach($images as $image){
            unlink($image->url);
        }
        $image->delete();
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }
    
}
