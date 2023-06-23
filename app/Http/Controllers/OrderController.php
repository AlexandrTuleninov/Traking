<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order; 
use App\Models\CartProduct;
use App\Models\Nomenclature;
use App\Models\ProductProvider;

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
        $total=0;
        foreach($request->request as $cartproduct_id){
            if(intval($cartproduct_id,10))
            {
               
                $cartproduct=CartProduct::find($cartproduct_id);
                $productprovider= ProductProvider::where(['product_id'=>$cartproduct->product_id, 'provider_id'=>$cartproduct->provider_id])
                ->first();
                $nomenclature->order_id= $order->id;
                $nomenclature->provider_id=$cartproduct->provider_id;
                $nomenclature->product_id= $cartproduct->product_id;
                //$nomenclature->country_id= $cartproduct->provider->coutry
                //$nomenclature->city_id= $request->input('city_id');
                $nomenclature->quantity= $cartproduct->quantity;
                $nomenclature->price= $productprovider->price;
                $nomenclature->total=$cartproduct->quantity*$productprovider->price;
                $total +=$nomenclature->total;
                $nomenclature->currency= $productprovider->currency;
                $nomenclature->add();
            }
            
        }
        
  
        $order->total = $total;
        $order->update();
        
        }
}
