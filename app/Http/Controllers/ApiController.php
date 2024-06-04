<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function ajaxSearch($key){
        $data = DB::table('products')
        ->join('product_images', 'product_images.product_id', '=', 'products.id')
        ->where('products.name', 'like', '%' . $key . '%')
        ->where('product_images.image_type', 0)
        ->get();
        return $data;
    }
}
