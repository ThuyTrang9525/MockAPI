<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getCartItems()
    {
        $cart = Session::get('cart', []);
        return response()->json($cart);
    }
    public function addToCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);
        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng']);
    }

}

