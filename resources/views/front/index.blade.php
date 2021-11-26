@extends('layouts.front_app')

@section('content')
@include('front.header')

<main role="main">
    @include('front.call_to_action')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @forelse ($pageData->layout as $catWithProducts)
                {{-- Cat Start --}}
                <div class="col-sm-12">
                    <h2><span class="badge badge-secondary">{{$catWithProducts->cat->title}}</span></h2>
                </div>
                {{-- Cat End --}}
                @forelse ($catWithProducts->products as $product)
                {{-- Product Start --}}
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{$product->photo}}" class="card-img-top" alt="{{$product->title}}">
                        <div class="card-body">
                            <h3>{{$product->title}}</h3>
                            <p class="card-text">{{$product->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
									<form action="{{route('cart.add', $product)}}" method="POST">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
									@csrf
									</form>
                                </div>
                                <i class="text-muted">{{$product->price}} EUR</i>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Product End --}}
                @empty
                <h4 class="m-5">This category has no products</h4>
                @endforelse
                @empty
                <h4 class="m-5">Products layout is empty</h4>
                @endforelse
            </div>
        </div>
    </div>
</main>
@include('front.footer')
@endsection
