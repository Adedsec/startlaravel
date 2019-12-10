<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ProductCreated;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as HttpResponse;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit']);
    }

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
        //dd($request->all());
        $request->validated();
        $product = Auth::user()->products()->create($request->except('_token'));
        $product->categories()->attach($request->get('category_id'));
        //sending mail
        event(new ProductCreated($product, Auth::user()));
        return redirect('/products');
        //$product = Product::create($request->except('_token'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $this->authorize('update', $product);
        //abort_if(($product->user->id != Auth::user()->id), HttpResponse::HTTP_UNAUTHORIZED);
        // if ($product->user->id != Auth::user()->id) {
        //     # code...
        //     //return redirect('/products');
        //     abort(HttpResponse::HTTP_UNAUTHORIZED, 'you are not authorized');
        // }
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {

        //find
        $product = Product::find($id);
        //update product
        $product->update($request->only(['name', 'description', 'weight', 'price']));

        //update categories

        $product->categories()->sync($request->get('category_id'));
        return redirect('/products');
    }


    // API

    public function showAPI($id)
    {
        return $product = Product::with('categories')->findOrFail($id);
    }

    public function indexAPI()
    {
        return Product::with(['user'])->get();
    }
    public function storeAPI(Request $request)
    {
        dd(Auth::user());
        $product = Auth::user()->products()->create($request->except('_token'));
    }
}
