@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Create Product
                </h5>
                <form method="POST" action="{{route('products.update',['id'=>$product->id])}}">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">name </label>
                        <input type="text" class="form-control" name="name" value="{{$product->name}}" id="name"
                               aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" value="{{$product->description}}"
                               id="description" placeholder="Enter description">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="number" class="form-control" name="weight" value="{{$product->weight}}" id="weight"
                               placeholder="Enter weight">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" value="{{$product->price}}" id="price"
                               placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id[]" id="category" class="form-control" multiple>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{$product->categories->contains('id',$category->id)?'selected':""}}>{{$category->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    @include('products.validation_error')
                </form>
            </div>
        </div>
    </div>

@endsection
