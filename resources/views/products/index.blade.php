@extends('layouts.app1')

@section('content')
@foreach ($products as $product)
<div>
    <a href={{"/products/".$product->id}}>
        <h1> {{$product->name}} </h1></a>
</div>
    
@endforeach
@endsection