<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'payment_option' => 'required',
            'shipment_option' => 'required',
        ]);

        $cart = collect(session()->get('cart'));
        $store = Store::find(session()->get('store')->id);
        $total_price = $cart->sum('total_price');


        $order = Order::create([
            'store_id' => $store->id,
            'user_id' => auth()->user()->id,
            'payment_method' => $request->payment_option,
            'shipment_method' =>  $request->shipment_option,
            'total_price' => $total_price,
            'status' => 'UNPAID',
        ]);


        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['total_price'],
            ]);
        }

        session()->forget('cart');
        session()->forget('store');

        return redirect()->route('account.order', $order->id);
    }
}
