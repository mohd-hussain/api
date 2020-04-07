@extends('layouts.master')

@section('title')
    Dashboard:Edit About Us 
@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit About Us For Registerd User.</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <form action="/update-aboutus/{{ $aboutusedit->id }}" method="POST">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" value="{{$aboutusedit->title}}" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                            <label>Subtitle</label>
                                            <input type="text" name="subtitle" value="{{$aboutusedit->subtitle}}" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" name="description" value="{{$aboutusedit->description}}" class="form-control" >
                                    </div>
    
                                    
    
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="/aboutus" class="btn btn-danger">Cancel</a>
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