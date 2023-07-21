<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Provider;

class CityController extends Controller
{
    public function add(Request $request){
        $city = new City();
        $city->name=$request->input('name');
        $city->country_id=$request->input('country_id');
        $city->save();
    }

    public function addProvider(Request $request){
        $data=$request->all();
        $provider= Provider::find($data['provider_id']);
        $city = City::find($data['city_id']);
        $city->providers()->save($provider);
    }
}
