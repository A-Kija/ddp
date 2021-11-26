@extends('layouts.front_app')

@section('content')
@include('front.header')

<main role="main">
    <form action="{{route('cart.update')}}" class="cart" method="POST">
        <div class="container mt-5">
            <h1>My Cart</h1>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-group mini-cart">
                        @forelse ( $pageData->cart as $cartProduct)
                        <li class="list-group-item">
                            <div class="mini-cart-product">
                                <img src="{{$cartProduct->photo}}">
                                <h5>{{$cartProduct->title}}</h5>
                                <div class="btn-holder">
                                    <h6>{{$cartProduct->price}} EUR X <input type="text" name="product[{{$cartProduct->id}}]" value="{{$cartProduct->count}}"></h6>
                                    <button class="svg" type="submit" name="delete" value="{{$cartProduct->id}}">
                                        <svg>
                                            <use xlink:href="#bin"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">
                            <h5>Cart is empty</h5>
                        </li>
                        @endforelse
                        @if($pageData->cartTotal)
                        <li class="list-group-item">
                            <h4>Total: {{$pageData->cartTotal}} EUR</h4>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cart-buttons">
                <button type="submit" class="btn btn-success">Update Cart</button>
                <a href="" class="btn btn-info">Go to Checkout</a>
            </div>
        </div>
        @csrf
    </form>
</main>
@include('front.footer')
@endsection
