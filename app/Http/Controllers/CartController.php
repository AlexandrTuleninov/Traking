<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartProducts;
use Illuminate\Support\Facades\Auth;
use Livewire\HydrationMiddleware\NormalizeComponentPropertiesForJavaScript;

class CartController extends Controller
{
    
    
    public function index(Request $request) {
        $cart_id = $request->cookie('cart_id');
        if (!empty($cart_id)) {
            $cart_products= Cart::find($cart_id)->cartproducts;
           
            return view('cart.index', compact('cart_products'));
        } else {
            abort(404);
        }
    }
    public function checkout() {
        return view('cart.checkout');
    }

    public function add(Request $request,$id) {
            $cart_id = $request->cookie('cart_id');
            $quantity = $request->input('quantity') ?? 1;
            $provider_id = $request->provider_id;
            $user_id=Auth::id();
                $cart= new Cart();
            if (Auth::check()){
                if(Cart::where('user_id',$user_id)->exists()){
                    $cart = Cart::where('user_id',$user_id)->first();
                    $cart->touch();
                    $cart_id=$cart->id;
                }
                elseif(empty($cart_id) ){
                    $cart->user_id=$user_id;
                    $cart->save();
                    $cart_id=$cart->id;
                    }
                    elseif(Cart::where('id',$cart_id)->exists())
                    {
                        $cart = Cart::where('user_id',$user_id)->first();
                        if($cart->user_id==$user_id){
                            $cart_id=$cart->id;
                        }
                        else{
                            $cart->user_id=$user_id;
                            $cart->update();
                        }
                    }
                    else{
                        $cart->user_id=$user_id;
                        $cart->save();
                        $cart_id=$cart->id;
                }
            }
            else{
                if (empty($cart_id)) {
                    $cart = Cart::create();
                    $cart_id = $cart->id;
                } else {
                    $cart = Cart::findOrFail($cart_id);
                    $cart->touch();
                }
            }
            
            
            $cartproducts= CartProducts::where(['cart_id'=>$cart_id, 'provider_id'=>$provider_id,'product_id'=>$id])->first();
           
            if (!empty($cartproducts)) {
                $cartproducts->quantity=$quantity+$cartproducts->quantity;
                
                $cartproducts->update();
            } else {
                $cartproducts= new CartProducts;
                $cartproducts->cart_id=$cart_id;
                $cartproducts->product_id=$id;
                $cartproducts->provider_id=$provider_id;
                $cartproducts->quantity=$quantity;
                $cartproducts->save();
            }

            return back()->withCookie(cookie('cart_id', $cart_id));
        }    
    
}
