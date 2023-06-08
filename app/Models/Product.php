<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(Provider::class);
    }

    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
    
}
