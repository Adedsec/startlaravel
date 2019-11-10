@extends('layouts.app')

@section('content')
    <div class="container col-6">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Creator</th>
                <th></th>
            </tr>
            @foreach ($products as $product)
                <tr class="container">
                    <td><a href={{"/products/".$product->id}}>
                            <p>{{$product->name}} </p></a></td>
                    <td><p>{{$product->user->name}}</p></td>
                    <td>
                        <a href="{{Route('products.edit',["id"=>$product->id])}}" class="btn btn-primary">Update</a>
                    </td>
                </tr>

            @endforeach
        </table>
        <div class="mt-3">
            <a href="{{route('products.create')}}" class=" btn btn-success btn-block"> Create</a>
        </div>

    </div>
    <

@endsection
