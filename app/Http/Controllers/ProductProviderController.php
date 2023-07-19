<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ProductProviderController extends Controller
{
    public function add(Request $request){
        $data = $request->all();
        $provider = new Provider();
        $provider->name = $data['name'];
        $provider->slug= Str::slug($data['name']);
        $provider->description= $data['description'];
        $provider->add();
        
        return back();
    }
}
