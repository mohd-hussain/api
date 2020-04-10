@extends('layouts.master')

@section('title')
    Dashboard:Edit Product Details 
@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Product Details .</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <form action="/update-product/{{ $product->id }}" method="POST">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <div class="form-group">
                                            <label>Product Name:</label>
                                            <input type="text" name="name" value="{{$product->name}}" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                            <label>Product Detail:</label>
                                            <input type="text" name="detail" value="{{$product->detail}}" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Price:</label>
                                        <input type="integer" name="price" class="form-control" value="{{$product->price}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Stock:</label>
                                        <input type="integer" name="stock" class="form-control" value="{{$product->stock}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Discount:</label>
                                        <input type="integer" name="discount" class="form-control" value="{{$product->discount}}">
                                    </div>
    
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="/products-all" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    
@endsection