@extends('layouts.master')

@section('title')
    Dashboard:Edit Product Review
@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Product Review .</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <form action="/update-review/{{ $review->id }}" method="POST">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <div class="form-group">
                                            <label>Customer Name:</label>
                                            <input type="text" name="customer" value="{{$review->customer}}" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                            <label>Product Review:</label>
                                            <input type="text" name="review" value="{{$review->review}}" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Rating:</label>
                                        <input type="integer" name="star" class="form-control" value="{{$review->star}}">
                                    </div>
    
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="/reviews-all" class="btn btn-danger">Cancel</a>
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