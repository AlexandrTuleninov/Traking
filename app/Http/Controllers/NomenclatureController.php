<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomenclature;

class NomenclatureController extends Controller
{
    public function add(Request $request)
    {
       $nomenclature= new Nomenclature();
       $nomenclature->provider_id=$request->input('provider_id');
       $nomenclature->product_id= $request->input('product_id');
       $nomenclature->country_id= $request->input('country_id');
       $nomenclature->city_id= $request->input('city_id');
       $nomenclature->quantity= $request->input('quantity');
       $nomenclature->price= $request->input('price');
       $nomenclature->total= $request->input('nomenclature_volume');
       $nomenclature->currency= $request->input('currency');
       $nomenclature->description= $request->input('description');
       $nomenclature->comment= $request->input('comment');
       
       $nomenclature->add();
    }
}
