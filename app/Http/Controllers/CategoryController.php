<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    
    public function add(Request $request){

        $category = new Category();
        $category->name = $request->input('name');
        $category->content = $request->input('content');
        $category->slug = $request->input('slug');
        $category->image = $request->input('image');
        $category->add();
    }
}
