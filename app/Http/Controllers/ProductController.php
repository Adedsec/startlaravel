<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['user'])->get();
        // $products = DB::table('products')->orderBy('name')
        //     ->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        // $product = DB::table('products')->find($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(CreateRequest $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'weight' => 'required',
        //     'price' => 'required'
        // ]);
        dd($request->all());
        $request->validated();
        $product = Auth::user()->products()->create($request->except('_token'));
        $product->categories()->attach($request->get('category_id'));
        return redirect('/products');
        //$product = Product::create($request->except('_token'));
    }
}
