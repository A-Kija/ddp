@extends('layouts.app')
@section('content')
<div id="extras"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header__wrap">
                        <h1>Extras list</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach ($extras as $extra)
                            <div class="col-6">
                                <div class="index-list">
                                    <div class="index-list__extra">
                                        @if ($extra->photo)
                                        <img src="{{$extra->photo}}">
                                        @else
                                        <img src="{{asset('img/no-image.png')}}">
                                        @endif
                                    </div>
                                    <div class="index-list__content">
                                        <div class="index-list__content__row">
                                            <div class="main-title">
                                                {{$extra->title}}
                                            </div>
                                        </div>
                                        <div class="index-list__content__row">
                                            <div class="index-list__extra">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Small: {{$extra->price_s}} Eur</li>
                                                    <li class="list-group-item">Medium: {{$extra->price_m}} Eur</li>
                                                    <li class="list-group-item">Large: {{$extra->price_l}} Eur</li>
                                                    <ul>
                                            </div>
                                            <div class="index-list__buttons">
                                                <a href="{{route('extra.edit', $extra)}}" class="btn btn-success m-2">EDIT</a>
                                                <form action="{{route('extra.destroy', $extra)}}" method="POST">
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
