<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function add(Request $request){
        $city = new City();
        $city->name=$request->input('name');
        $city->country_id=$request->input('country_id');
        $city->add();
    }
}
