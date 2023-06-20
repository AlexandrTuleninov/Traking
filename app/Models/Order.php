<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    private $total, $present_total,
    $description,$order_volume,
    $user_id,$country,
    $city_id, $delivery_address,
    $traking_number,$delivery_date;
    
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function nomenclature(){
        return $this->hasMany(Nomenclature::class);
    }
    public function add(){
        //проверка 
        $this->save();  
    }
}
