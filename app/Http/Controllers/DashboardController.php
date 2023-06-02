<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function base_router(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin'){
                return redirect()->route('dashboard');
            }
            else{
                return redirect()->route('products');
            }
        }
    }

    public function index(Request $request)
    {
        $product_number = Product::get()->count();
        $user_number = User::get()->count();
        return view('dashboard.index', compact('product_number', 'user_number'));
    }

    public function products(Request $request)
    {
        $products = Product::orderBy('id')->get();
        return view('dashboard.products', compact('products'));
    }

    public function product_delete(Request $request)
    {
        Product::where('id', $request->product_id)->delete();
        return redirect()->route('dashboard_products');
    }

}
