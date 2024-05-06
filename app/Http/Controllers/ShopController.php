<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){ 
        $category = Category::where('parent_id',0)->get();
        $product = Product::paginate(4);
        return view('client.shop',['category'=>$category,'products'=>$product]);
    }
    public function showByCategory($id){
        $category = Category::where('parent_id',0)->get();
        $product = Product::where('category_id',$id)->get();
        return view('client.shop',['category'=>$category,'products'=>$product]);
    }
    public function getProductDetail($id){
        $product = Product::with('category')->find($id);
        return view('client.singleproduct',compact('product'));
    }
}
