@extends('layouts.app1')

@section('content')
    <h1 class="mt-5 title">
        {{$product->name}}
    </h1>
    <p class="mt-5">
        Description : {{$product->description}}
    </p>
    <p>
        Weight : {{$product->weight}}
    </p>
    <p>
        Price : {{$product->price}}
    </p>
@endsection