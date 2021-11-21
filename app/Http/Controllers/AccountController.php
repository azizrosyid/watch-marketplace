<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function address()
    {
        $address = auth()->user()->address;
        return view('account.address', compact('address'));
    }

    public function orders()
    {
        $orders = auth()->user()->orders;
        return view('account.orders', compact('orders'));
    }

    public function order($id)
    {
        $order = auth()->user()->orders()->findOrFail($id);
        return view('account.order', compact('order'));
    }

    public function settings()
    {
        return view('account.settings');
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        auth()->user()->update([
            'name' => $request->name,
            'phone_number' => $request->phone,
            'address' => $request->address,
        ]);

        return back()->withMessage('Your account has been updated!');
    }
}
