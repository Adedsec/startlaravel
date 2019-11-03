@extends('layouts.app')

@section('content')
    @foreach ($products as $product)
        <div class="container">
            <a href={{"/products/".$product->id}}>
                <h3>{{$product->name}} </h3></a>
            <p><strong>Creator : </strong> {{$product->user->name}}</p>
        </div>

    @endforeach
@endsection
