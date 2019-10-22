@extends('layouts.app1')

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <h5 class="card-title">
            Create Product
        </h5>
            <form method="POST" action="{{route('product.store')}}">
                {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">name </label>
                      <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" name="description" value="{{old('description')}}" id="description" placeholder="Enter description">
                    </div>
                    <div class="form-group">
                      <label for="weight">Weight</label>
                      <input type="number" class="form-control" name="weight" value="{{old('weight')}}" id="weight" placeholder="Enter weight">
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" name="price" value="{{old('price')}}" id="price" placeholder="Enter price">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    @include('products\validation_error')
            </form>
    </div>
</div>

@endsection