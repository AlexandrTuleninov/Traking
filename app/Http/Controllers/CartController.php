<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    private $cart;
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

    public function add(Request $request, $id) {
        $cart_id = $request->cookie('cart_id');
        $quantity = $request->input('quantity') ?? 1;
        if (empty($cart_id)) {
            // если корзина еще не существует — создаем объект
            $cart = Cart::create();
            // получаем идентификатор, чтобы записать в cookie
            $cart_id = $cart->id;
        } else {
            // корзина уже существует, получаем объект корзины
            $cart = cart::findOrFail($cart_id);
            // обновляем поле `updated_at` таблицы `carts`
            $cart->touch();
        }
        if ($cart->products->contains($id)) {
            // если такой товар есть в корзине — изменяем кол-во
            $pivotRow = $cart->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            // если такого товара нет в корзине — добавляем его
            $cart->products()->attach($id, ['quantity' => $quantity]);
        }
        // выполняем редирект обратно на страницу, где была нажата кнопка «В корзину»
        return back()->withCookie(cookie('cart_id', $cart_id, 525600));
    }
}
