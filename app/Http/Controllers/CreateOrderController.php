<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Order;
use App\Models;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Type\Integer;

class CreateOrderController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'total' => ['required', 'double'],
            'present_total' => ['required', 'double'],
            'description' => ['required', 'string', 'max:255'],
            
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Order
     */
    protected function create(array $data)
    {
        return Order::create([
            'total' => $data['total'],
            'present_total' => $data['present_total'],
            'order_volume' => $data['order_volume'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
            'country_id' => $data['country_id'],
            'city_id' => $data['city_id'],
            'delivery_address' => $data['delivery_address'],
        ]);
    }
    protected function update(Integer $id,array $data)
    {
        $order = Order::find($id);
        return $order::update($data);
        
    }
}
