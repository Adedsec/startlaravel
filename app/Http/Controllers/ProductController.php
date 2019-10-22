<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // $products = DB::table('products')->orderBy('name')
        //     ->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        // $product = DB::table('products')->find($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(CreateRequest $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'weight' => 'required',
        //     'price' => 'required'
        // ]);
        $request->validated();
        Auth::user()->products()->create($request->except('_token'));
        //$product = Product::create($request->except('_token'));
    }
}
