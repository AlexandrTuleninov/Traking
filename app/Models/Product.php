<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illiminate\Support\Integer;

class Product extends Model
{
 
    use HasFactory;
    protected $guarded = [];  
 
    public function nomenclature()
    {
        return $this->hasMany(nomenclature::class);
    }

    public function providers()
    {
        return $this->belongsToMany(Provider::class)->withPivot('price','currency');;
    }

    public function carts() {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
    
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
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
    public function add(){
        $this->slug = Str::slug($this->name);
        if (Product::where('slug',$this->slug)->exists()){
            return back();
        }
        else{
           $this->save();
            return $this->id;
        }

    }
}
