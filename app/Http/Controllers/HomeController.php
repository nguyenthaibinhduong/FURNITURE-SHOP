<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $brands= Brand::all();
        $categories = Category::where('parent_id','<>',0)->get();
        $banners =Banner::all();
        $images = ProductImage::where('image_type',0)->get();
        $products = Product::all();
        return view('client.home',compact('products','images','banners','categories','brands'));
    }
}
