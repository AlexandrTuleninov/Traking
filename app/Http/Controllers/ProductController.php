<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
    public function addIndex()
    {
        return view('product.add');
    }


    public function add(Request $request){
        $data = $request->all();
        $product = new Product();
        $product->name = $data['name'];
     
        $product_id=$product->add();
        $filename= $data['image']->getClientOriginalName();
      
        //Сохраняем оригинальную картинку
        $data['image']->Image::insert('/public/1.svg');
        return back();
    }

}
