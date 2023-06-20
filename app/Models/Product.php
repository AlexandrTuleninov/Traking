<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CartController;
use League\CommonMark\Normalizer\SlugNormalizer;
use Illuminate\Support\Str;

class Product extends Model
{
    private  $name,$slug,$price,
    $measure,$commodity_volume,
    $category_id,$description;
    use HasFactory;
 
    public function nomenclature()
    {
        return $this->hasMany(nomenclature::class);
    }

    public function providers()
    {
        return $this->belongsToMany(Provider::class);
    }

    public function carts() {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
    
    public function validation(Product $product){
        $validated = $product->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required|digits',
            'measure'=>'required|max:255',
            'category_id'=>'required|max:255',
            'description'=>'required',
            'commodity_volume'=>'required',
        ]);
    }
    public function add(Product $product){
        $product->slug = Str::slug($product->name);
        if (Product::where('slug',$product->slug)->exists()){
            return back();
        }
        else{
            Product::create(['name' => $product->name,
            'slug'=>$product->slug,
            'price'=>$product->price,
            'measure'=>$product->measure,
            'commodity_volume'=>$product->commodity_volume,
            'category_id'=>$product->category_id,
            'description'=>$product->description]);

            return view('catalog.product', compact('product'));
        }

    }
}
