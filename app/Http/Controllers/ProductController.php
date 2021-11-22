<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->limit(50)->get();
        $banners = DB::table('banner')->get();
        return view('welcome', compact('products', 'banners'));
    }

    public function shop()
    {
        $products = Product::inRandomOrder()->get();
        return view('shop', compact('products'));
    }

    public function hot()
    {
        $products = Product::inRandomOrder()->limit(10)->get();
        return view('products.hot', compact('products'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);
        $keyword = $request->input('query');
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        return view('products.search', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('products.show', compact('product'));
    }

}
