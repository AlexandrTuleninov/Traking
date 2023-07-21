<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    
    public function add(Request $request){
        $data = $request->all();
        Category::add($data);
    }
    
    public function updatePhoto(Request $request){
        $data = $request->all();
        $category= Category::find($data['category_id']);
        $category->addPhoto($data);
        $category->getUrlPhoto($data);
        $category->update();
    }

    public function addProduct(Request $request){
        $data = $request->all();
        $category = Category::find($data['product_id']);
        $product = Product::find($data['product_id']);
        $category->product()->save($product);
    }
}
