@extends('layouts.app')
@section('content')
<div id="products"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header__wrap">
                        <h1>Products list</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach ($products as $product)
                            <div class="col-6">
                                <div class="index-list">
                                    <div class="index-list__extra">
                                        @if ($product->photo)
                                        <img src="{{$product->photo}}">
                                        @else
                                        <img src="{{asset('img/no-image.png')}}">
                                        @endif
                                    </div>
                                    <div class="index-list__content">
                                        <div class="index-list__content__col">
                                            <div class="main-title">
                                                {{$product->title}}
                                            </div>
                                            <div class="main-desc">
                                                {{$product->description}}
                                            </div>
                                        </div>
                                        <div class="index-list__content__row">
                                            <div class="index-list__product">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Amount: {{$product->amount}}</li>
                                                    <li class="list-group-item">Price: {{$product->price}} Eur</li>
                                                    <li class="list-group-item" data-toggle="tooltip" data-html="true" title="{!! $product->info  !!}">Info</li>
                                                    @if($product->cats->first())
                                                    <li class="list-group-item">Cat: {{$product->cats->first()->title}}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="index-list__buttons">
                                                <a href="{{route('product.edit', $product)}}" class="btn btn-success m-2">EDIT</a>
                                                <form action="{{route('product.destroy', $product)}}" method="POST">
                                                    <button type="submit" class="btn btn-danger m-2">DELETE</button>
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
