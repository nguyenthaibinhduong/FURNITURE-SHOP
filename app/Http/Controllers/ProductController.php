<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $category;
    public function __construct(Category $category)
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
        return view('admin.product.index',compact('products'));
    }
    public function create()
    {
        $option= $this->getCategories($parent_id='');
        return View('admin.product.create',['option'=>$option]);
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'price' => 'required|numeric',
        //     'quantity' => 'required|numeric',
        //     'description' => 'nullable|string',
        //     'category' => 'required|string',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('image/product'), $imageName);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);

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
