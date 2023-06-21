<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    public function product() {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function provider() {
        return $this->hasOne(Provider::class,'id','provider_id');
    }
    public function cart(){
        return $this->hasOne(Cart::class,'id','cart_id');
    }
}
