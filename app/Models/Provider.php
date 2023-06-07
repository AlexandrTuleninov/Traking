<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
    public function contacts()
    {
        return $this->belongsToMany(Contacts::class);
    }
    public function countries(){
        return $this->belongsToMany(Country::class);
    }
}
