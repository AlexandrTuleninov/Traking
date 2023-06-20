<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function add(Request $request){
        $country= new Country();
        $country->name= $request->input('name');
    }
}
