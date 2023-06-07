<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        
       
    $products=Product::paginate(50);
    foreach($products as $thisProduct)
    {  dump ($thisProduct);
        dump ($thisProduct->providers);
    }
  
    }       
}
