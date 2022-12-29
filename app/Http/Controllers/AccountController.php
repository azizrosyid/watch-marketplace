<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function uploadPayment(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $link = Storage::disk('do')->putFileAs('payments', $request->file('payment'), Carbon::now()->timestamp . '-' . $order->id . '.jpg');
        $order->image = 'https://rosyid.sgp1.digitaloceanspaces.com/' . $link;
        $order->status = 'PENDING';
        $order->save();
        return redirect()->route('account.order', $id);
    }

    public function confirmReceived($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'DELIVERED';
        $order->save();
        return redirect()->route('account.order', $id);
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
