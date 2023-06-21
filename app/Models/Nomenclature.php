<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomenclature extends Model
{
    protected $guarded = [];  
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->hasOne(Product::class);
    }
    public function provider()
    {
        return $this->hasOne(Provider::class);
    }


    public function add(){
        //тут должна быть валидация
        Nomenclature::create(['order_id'=>$this->order_id,
    'provider_id'=>$this->provider_id,
    'product_id'=>$this->product_id,
    'country_id'=>$this->country_id,
    'city_id'=>$this->city_id,
    'quantity'=>$this->quantity,
    'price'=>$this->price,
    'total'=>$this->total,
    'nomenclature_volume'=>$this->nomenclature_volume,
    'currency'=>$this->currency,
    'present_price'=>$this->present_price,
    'present_total'=>$this->present_total,
    'description'=>$this->description,
    'comment'=>$this->comment,]);
    }
}
