<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(){ 
        $images = ProductImage::where('image_type',0)->get();
        $category = Category::where('parent_id',0)->get();
        $brands  = Brand::all();
        $product = Product::paginate(16);
        return view('client.shop',['category'=>$category,'products'=>$product,'images'=>$images,'brands'=>$brands]);
    }
    public function showByCategory($id){
        $images = ProductImage::where('image_type',0)->get();
        $category = Category::where('parent_id',0)->get();
        $product = Product::where('category_id',$id)->get();
        $brands = Brand::whereHas('products', function($query) use ($id) {
            $query->where('category_id', $id);
        })->get();
        $cate=$id;
        return view('client.shop',['category'=>$category,'products'=>$product,'images'=>$images,'brands'=>$brands,"cate"=>$cate]);
    }
    public function showByBrand($cate,$id){
        if($cate==0){
            $images = ProductImage::where('image_type',0)->get();
            $category = Category::where('parent_id',0)->get();
            $product = Product::where('brand_id',$id)->get();
            $brands = Brand::all();
        }else{
            $images = ProductImage::where('image_type',0)->get();
            $category = Category::where('parent_id',0)->get();
            $product = Product::where('brand_id',$id)->get();
            $brands = Brand::whereHas('products', function($query) use ($cate) {
                $query->where('category_id', $cate);
            })->get();
        }
        
        return view('client.shop',['category'=>$category,'products'=>$product,'images'=>$images,'brands'=>$brands]);
    }
    public function getProductDetail($id){
        $images = ProductImage::where('product_id',$id)->get();
        $product = Product::with('category')->find($id);
        return view('client.singleproduct',compact('product','images'));
    }
}
