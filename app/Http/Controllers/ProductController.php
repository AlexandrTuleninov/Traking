<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Photo;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $product = new Product;
        $product->name = $data['name'];
        $product->slug= Str::slug($data['name']);
        $product->measure= $data['measure'];
        $product->description = $data['description'];
        $product->commodity_volume=$data['commodity_volume'];
        $product->save();

        $photo = new Photo;
        
        $filename=(string)$product->slug.(string)'.' . (string)$data['image']->extension();
        $data['image']->move(Storage::path('/public/image/products/').'origin/',$filename);

        $provider->product()->save($product);
        $thumbnail = Image::make(Storage::path('public/image/products/').'origin/'.$filename);
        $thumbnail->fit(400,400);
        $thumbnail->save(Storage::path('public/image/products/').'400x400/'.$filename);
        $thumbnail->fit(120,120);
        $thumbnail->save(Storage::path('/public/image/products/').'120x120/'.$filename);

        $data['image'] = $filename;

        return back();
    }

}
