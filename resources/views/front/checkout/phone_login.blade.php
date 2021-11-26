@extends('layouts.front_app')

@section('content')
@include('front.header')

<main role="main">
    <form action="{{route('checkout.doPhoneLogin')}}" class="cart" method="POST">
        <div class="container mt-5">
            <h1>Enter Phone</h1>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <input class="m-2" type="text" name="phone_login">
                    <button type="submit" class="btn btn-success">Next</button>
                </div>
            </div>
        </div>
        @csrf
    </form>
</main>
@include('front.footer')
@endsection
