<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    
    
    public function index(Request $request) {
        $cart_id = $request->cookie('cart_id');
        if (!empty($cart_id)) {
            $products = Cart::findOrFail($cart_id)->products;
            return view('cart.index', compact('products'));
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
            if (empty($cart_id)||!Cart::where('id',$cart_id)->count()) {
                $cart = Cart::create();
                $cart_id = $cart->id;
            } else {
                $cart = Cart::findOrFail($cart_id);
                $cart->touch();
            }
            if ($cart->products->contains($id) && $cart->providers->contains($provider_id)) {
                
                $pivotRow = $cart->products()->where('product_id', $id)->first()
                ->pivot->where('provider_id',$provider_id)->first();
                
                $quantity = $pivotRow->quantity + $quantity;
                $pivotRow->update(['quantity' => $quantity]);
            } else {
                $cart->products()->attach( $id,['quantity' => $quantity,'provider_id'=>$provider_id]);
            }

            return back()->withCookie(cookie('cart_id', $cart_id));
        }    
    
}
