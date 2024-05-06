<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function ajaxSearch($key){
        $data = Product::where('name', 'like', '%' . $key . '%')->get();
        return $data;
    }
}
