<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CartController;

class Cart extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    public function providers() {
        return $this->belongsToMany(Provider::class,'cart_product')->withPivot('quantity');
    }
    

    public function add(object $request,$id) {
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
