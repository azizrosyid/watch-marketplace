<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart.index');
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        } else {
            $cart = [];
        }

        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity']++;
            $cart[$product->id]['total_price'] = $cart[$product->id]['quantity'] * $product->price;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                'slug' => $product->slug,
                "quantity" => 1,
                "total_price" => $product->price * 1,
            ];
        }

        session()->put('store', $product->store);
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }


    public function removeFromCart($id)
    {
        return redirect()->route('cart.index');
    }

    public function clearCart()
    {
        return redirect()->route('cart.index');
    }
}
