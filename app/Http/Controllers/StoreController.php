<?php

namespace App\Http\Controllers;

use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with('products')->get();
        return view('store.index', compact('stores'));
    }

    public function show($slug)
    {
        $store = Store::where('slug', $slug)->firstOrFail();
        return view('store.show', compact('store'));
    }
}
