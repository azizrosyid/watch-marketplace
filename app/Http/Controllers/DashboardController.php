<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Bschmitt\Amqp\Facades\Amqp;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['order_items.product'])->get();
        return view('dashboard.index', compact('orders'));
    }

    public function approve($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'PAID';
        $order->save();
        return redirect()->route('dashboard');
    }

    public function reject($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'UNPAID';
        $order->save();
        return redirect()->route('dashboard');
    }

    public function addTrackingNumber(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->delivery_code = $request->tracking_number;
        $order->status = 'ON_DELIVERY';
        $order->save();
        return redirect()->route('dashboard');
    }

    public function product()
    {
        return view('dashboard.products');
    }

    public function export()
    {
        return view('dashboard.export');
    }

    public function exportProduct(Request $request)
    {
        $data = $request->all();
        Amqp::publish('export', json_encode($data), ['queue' => 'export']);
        return redirect()->route('dashboard.export');
    }

    public function sendInvoice(Request $request)
    {
        $data = [
            'type' => 'invoice',
            'email' => $request->email,
            'order_id' => $request->order,
            'user_id' => $request->user,
        ];
        Amqp::publish('export', json_encode($data), ['queue' => 'export']);
        return redirect()->route('dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
