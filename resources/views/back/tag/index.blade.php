@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Tags</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($tags as $tag)
                        <li class="list-group-item">
                            <div class="list-container">
                                <div class="list-container__content">
                                    {{$tag->title}}
                                </div>
                                <div class="list-container__buttons">
                                    <a href="{{route('tag.edit',[$tag])}}" class="btn btn-success">Edit</a>
                                    <form method="POST" action="{{route('tag.destroy', $tag)}}">
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
