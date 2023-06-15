<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CartController;

class Cart extends Model
{
    use HasFactory;
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    public function providers() {
        return $this->belongsToMany(Provider::class,'cart_product')->withPivot('quantity');
    }
    
}
