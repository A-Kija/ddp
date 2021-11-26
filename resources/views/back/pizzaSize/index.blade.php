@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Pizza Sizes</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($pizzaSizes as $pizzaSize)
                        <li class="list-group-item">
                            <div class="list-container">
                                <div class="list-container__content">
                                    {{$pizzaSize->title}}
                                    <small>{{$pizzaSize->size}}</small>
                                </div>
                                <div class="list-container__buttons">
                                    <a href="{{route('pizzaSize.edit',[$pizzaSize])}}" class="btn btn-success">Edit</a>
                                    <form method="POST" action="{{route('pizzaSize.destroy', $pizzaSize)}}">
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
