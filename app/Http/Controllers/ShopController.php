<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){ 
        $images = ProductImage::where('image_type',0)->get();
        $category = Category::where('parent_id',0)->get();
        $product = Product::paginate(4);
        return view('client.shop',['category'=>$category,'products'=>$product,'images'=>$images]);
    }
    public function showByCategory($id){
        $images = ProductImage::where('image_type',0)->get();
        $category = Category::where('parent_id',0)->get();
        $product = Product::where('category_id',$id)->get();
        return view('client.shop',['category'=>$category,'products'=>$product,'images'=>$images]);
    }
    public function getProductDetail($id){
        $images = ProductImage::where('product_id',$id)->get();
        $product = Product::with('category')->find($id);
        return view('client.singleproduct',compact('product','images'));
    }
}
