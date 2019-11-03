@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5 title">
            {{$product->name}}
        </h1>
        <p class="mt-5">
            <strong>Description : </strong> {{$product->description}}
        </p>
        <p>
            <strong>Weight : </strong> {{$product->weight}}
        </p>
        <p>
            <strong>Price : </strong> {{$product->price}}
        </p>

        <p>
            <strong>owner : </strong> {{$product->user->name}}
        </p>
        <strong>Categories : </strong>
        @foreach($product->categories as $category)
            <em>
                {{$category->name.','}}
            </em>
        @endforeach
    </div>

@endsection
