<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()

    {

        $products = Product::all();

        return view('products', compact('products'));

    }

  

   
}
