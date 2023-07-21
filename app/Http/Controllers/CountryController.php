<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Provider;

class CountryController extends Controller
{
    public function add(Request $request){
        $country= new Country();
        $country->name= $request->input('name');
    }

    public function addCity(Request $request){
        $data = $request->all();
        $country = Country::find($data['country_id']);
        $city = City::find($data['city_id']);
        $country->cities()->save($city);
    }

    public function addProvider(Request $request){
        $data = $request->all();
        $country = Country::find($data['country_id']);
        $provider = Provider::find($data['provider_id']);
        $country->cities()->save($provider);
    }

}
