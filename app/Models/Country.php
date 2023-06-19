<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
    /*public function providers(){
        return $this->hasManyThrough(Provider::class, City::class);
    }*/
    public function providers()
    {
        return $this->belongsToMany(Providers::class);
    }
    public function add(){
        Country::create(['name'=>$this->name]);
        return view('counrty', compact('this'));
    }
}
