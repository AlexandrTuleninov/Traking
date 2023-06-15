<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CartController;

class Product extends Model
{
    use HasFactory;
    public function index(){
        $products=Product::paginate(50);
        return  $this->paginate(50);
    }
    public function nomenclature()
    {
        return $this->hasMany(nomenclature::class);
    }

    public function providers()
    {
        return $this->belongsToMany(Provider::class)->withTimestamps();;
    }

    public function carts() {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
    
}
