@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Categories</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($cats as $cat)
                        <li class="list-group-item">
                            <div class="list-container">
                                <div class="list-container__content">
                                    {{$cat->title}}
                                </div>
                                <div class="list-container__buttons">
                                    <a href="{{route('cat.edit',[$cat])}}" class="btn btn-success">Edit</a>
                                    <form method="POST" action="{{route('cat.destroy', $cat)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
