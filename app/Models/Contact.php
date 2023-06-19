<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public function Provider(){
        return $this->hasOne(Provider::class);
    }

    public function add(){
        Contact::create(['number_phone'=>$this->number_phone,
    'email'=>$this->email,
    'provider_id'=>$this->provider_id,
    ]);
        return view('provider.contact', compact('this'));
    }
}
