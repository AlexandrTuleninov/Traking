<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function add(Request $request){
        $request->arrayAccess;
        $category = new Category();
        foreach($request as $Arrayable =>$ArrayAccess ){
            $category->$Arrayable = $ArrayAccess;
        }
        $category->add();
    }
}
