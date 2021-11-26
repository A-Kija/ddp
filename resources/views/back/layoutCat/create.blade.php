@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card layout-add">
                <div class="card-header">Add Cat to Layout</div>
                <div class="card-body">
                    <form method="POST" action="{{route('layoutCat.store')}}">
                        <div class="form-group">
                            <label>Select Cat: </label>
                            <select class="form-control" name="layout_cat_id">
                                <option value="0">Select Cat</option>
                                @foreach ($cats as $cat)
                                <option value={{$cat->id}}
                                @if (in_array($cat->id, $usedCats)) disabled @endif
                                @if (old('layout_cat_id') == $cat->id) selected @endif>{{$cat->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <small class="form-text text-muted">Select Category to add it to Layout.</small>
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title') Add Category to Layout @endsection
