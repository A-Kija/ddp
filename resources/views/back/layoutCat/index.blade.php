@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Categories Layout</div>
                <div class="card-body">
                    <ul class="list-group" id="arrow-buttons">
                        @foreach ($layoutCats as $layoutCat)
                        <li class="list-group-item">
                            <div class="list-container">
                                <div class="list-container__content">
                                    {{$layoutCat->getCatName->title}} {{$layoutCat->id}}
                                </div>

                                <div class="list-container__buttons">
                                    <div class="list-container__svg">
                                        <form method="POST" action="{{route('layoutCat.up', $layoutCat)}}">
                                            @csrf
                                            <button type="submit">
                                                <svg>
                                                    <use xlink:href="#arrow"></use>
                                                </svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{route('layoutCat.down', $layoutCat)}}">
                                            @csrf
                                            <button>
                                                <svg class="rotate">
                                                    <use xlink:href="#arrow"></use>
                                                </svg>
                                            </button type="submit">
                                        </form>
                                    </div>
                                    <form method="POST" action="{{route('layoutCat.destroy', $layoutCat)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remove</button>
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
@include('layouts.svg')
@endsection

