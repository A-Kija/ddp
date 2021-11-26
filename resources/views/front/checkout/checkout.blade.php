@extends('layouts.front_app')

@section('content')
@include('front.header')

<main role="main">
    <form action="{{route('checkout.storeClient', $client)}}" class="cart" method="POST">
        <div class="container mt-5">
            <h1>{{$client->phone}}</h1>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <label>Name:</label>
                    <input class="m-2" type="text" name="client_name" value="{{$client->name}}">
                </div>
                <div class="col-sm-12">
                    <label>Address:</label>
                    <input class="m-2" type="text" name="client_address" value="{{$client->address}}">
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </div>
        </div>
        @csrf
    </form>
    <form action="{{route('checkout.order', $client)}}" class="cart" method="POST">
        <div class="container mt-5">
            <button type="submit" class="btn btn-dark">Order</button>
        </div>
        @csrf
    </form>
</main>
@include('front.footer')
@endsection
