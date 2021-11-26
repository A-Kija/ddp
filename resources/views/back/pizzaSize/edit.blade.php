@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pizza Size</div>
                <div class="card-body">
                    <form method="POST" action="{{route('pizzaSize.update',$pizzaSize)}}">
                        <div class="form-group">
                            <label>Title: </label>
                            <input type="text" class="form-control" name="pizzaSize_title" value="{{old('pizzaSize_title', $pizzaSize->title)}}">
                            <small class="form-text text-muted">Pizza Size title.</small>
                        </div>
                        <div class="form-group">
                            <label>Description: </label>
                            <input type="text" class="form-control" name="pizzaSize_size" value="{{old('pizzaSize_size', $pizzaSize->size)}}">
                            <small class="form-text text-muted">Pizza Size description.</small>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
