<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Nomenclature;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateNomenclatureController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Nomenclature
     */
    protected function create(array $data)
    {
        return Nomenclature::create([
            'order_id' => $data['order_id'],
            'provider_id' => $data['provider_id'],
            'product_id' => $data['product_id'],
            'amount' => $data['amount'],
            'price' => $data['price'],
            'total' => $data['total'],
            'nomenclature_volume' => $data['nomenclature_volume'],
            'currency' => $data['currency'],
            'present_price' => $data['present_price'],
            'present_total' => $data['present_total'],
            'description' => $data['description'],
            'comment' => $data['comment'],
        ]);
    }
}
