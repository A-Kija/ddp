@extends('layouts.app')

@section('content')
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <ul class="list-group">
                @foreach ($cats as $cat)
                <li class="list-group-item">
                    <a class="links-list" href="{{route('layoutProduct.index', $cat)}}">{{$cat->title}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$header}}</div>
                <div class="card-body">
                    <ul class="list-group" id="arrow-buttons">
                        @forelse ($layoutProducts as $layoutProduct)
                        <li class="list-group-item">
                            <div class="list-container">
                                <div class="list-container__content">
                                    {{$layoutProduct->getProduct->title}} {{$layoutProduct->id}}
                                </div>
                                <div class="index-list__extra">
                                    @if ($layoutProduct->getProduct->photo)
                                    <img src="{{$layoutProduct->getProduct->photo}}">
                                    @else
                                    <img src="{{asset('img/no-image.png')}}">
                                    @endif
                                </div>

                                <div class="list-container__buttons">
                                    <div class="list-container__svg">
                                        <form method="POST" action="{{route('layoutProduct.up', [$layoutProduct, $catNow])}}">
                                            @csrf
                                            <button type="submit">
                                                <svg>
                                                    <use xlink:href="#arrow"></use>
                                                </svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{route('layoutProduct.down', [$layoutProduct, $catNow])}}">
                                            @csrf
                                            <button>
                                                <svg class="rotate">
                                                    <use xlink:href="#arrow"></use>
                                                </svg>
                                            </button type="submit">
                                        </form>
                                    </div>
                                    <form method="POST" action="{{route('layoutProduct.destroy', $layoutProduct)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                            <li class="list-group-item">{{$message}}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.svg')
@endsection
