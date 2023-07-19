<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProviderController extends Controller
{
    public function add(Request $request){
        $data = $request->all();
        $provider = Provider::create();
        $provider->name = $data['name'];
        $provider->slug= Str::slug($data['name']);
        $provider->description= $data['description'];
        $provider->save();
        $user = auth()->user();
        $provider->users()->save($user);

        return back();
    }

    public function addUser(Request $request){
        $data = $request->all();
        $manager = User::find($data['manager_id']);
        $user = auth()->user();
        $provider = $user->provider;
        $provider->user()->save($manager);

        return back();
    }
    public function addProduct(Request $request){
        $data = $request->all();
        $product= Product::find($data['product_id']);
        $user = auth()->user();
        $provider = $user->provider;
        $provider->product()->save($product);
        
        return back();
    }
}
