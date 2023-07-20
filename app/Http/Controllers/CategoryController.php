<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
class CategoryController extends Controller
{
    
    public function add(Request $request){
        $data = $request->all();
        $category= Category::create();
        $category->name=$data['name'];
        $category->slug= Str::slug($data['name']);
        $category->content= $data['content'];
    }
}
