<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $images = ProductImage::where('image_type',0)->get();
        $products = Product::paginate(4);
        return view('client.home',compact('products','images'));
    }
}
