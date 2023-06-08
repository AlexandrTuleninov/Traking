<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
    $products=Product::All();
    return view('productlist',['products'=>$products]) ; 
}
}