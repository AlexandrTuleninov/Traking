<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;


class ProviderController extends Controller
{
    public function add(Request $request){
        $data = $request->all();
        $provider = new Provider();
        $provider->name = $data['name'];
     
        //Сохраняем оригинальную картинку
        $data['image']->Image::insert('/public/1.svg');
        return back();
    }

}
