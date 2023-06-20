<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function add(Request $request){
        $order = new Order();
        $order->user_id= $request->input('user_id');
        $order->country_id= $request->input('country_id');
        $order->city_id= $request->input('city_id');
        $order->total = $request->input('total');
        $order->present_total= $request->input('present_total');
        $order->description= $request->input('description');
        $order->order_volume= $request->input('order_volume');
        $order->delivery_address= $request->input('delivery_address');
        $order->traking_number= $request->input('traking_number');
        
        }
}
