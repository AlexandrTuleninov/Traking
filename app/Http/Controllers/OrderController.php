<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order; 
use App\Models\CartProduct;
use App\Models\Nomenclature;

class OrderController extends Controller
{
    public function add(Request $request){
        dump($request->request);
        $user_id=Auth::id();
        $order = new Order();
        $order->user_id=$user_id;
        $order->save();
        
        $nomenclature= new Nomenclature();
        $cartproduct = new CartProduct();
        foreach($request->request as $cartproduct_id){
            if(intval($cartproduct_id,10))
            {
                $cartproduct=CartProduct::find($cartproduct_id);
                $nomenclature->order_id= $order->id;
                $nomenclature->provider_id=$cartproduct->provider_id;
                $nomenclature->product_id= $cartproduct->product_id;
                //$nomenclature->country_id= $cartproduct->provider->coutry
                //$nomenclature->city_id= $request->input('city_id');
                $nomenclature->quantity= $cartproduct->quantity;
                $nomenclature->price= $cartproduct->product->price;
                $nomenclature->total=$cartproduct->quantity*$cartproduct->product->price;
                $nomenclature->currency= $cartproduct->product->currency;
                $nomenclature->add();
            }
            
        }
        
        dd();
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
