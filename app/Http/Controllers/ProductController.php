<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        Product::create([
            'avatar' => $request->file('avatar')->store('image', 'public'),
            'title' => $request->input('title'), 
            'price' => $request->input('price'), 
        ]);
        
        return redirect()->route('products')->with('success','Product has been created successfully.');
    }

}
