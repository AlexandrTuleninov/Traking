<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function add(Request $request){
        $request->arrayAccess;
        $city = new City();
        foreach($request as $Arrayable =>$ArrayAccess ){
            $city->$Arrayable = $ArrayAccess;
        }
        $city->add();
    }
}
