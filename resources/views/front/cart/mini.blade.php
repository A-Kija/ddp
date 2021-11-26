@if(!isset($pageData->hideMiniCart))
<ul class="list-group mini-cart">
    @forelse ( $pageData->cart as $cartProduct)
    <li class="list-group-item">
        <div class="mini-cart-product">
            <img src="{{$cartProduct->photo}}">
            <h5>{{$cartProduct->title}}</h5>
            <form action={{route('cart.remove', $cartProduct)}} class="cart" method="POST">
                <h6>{{$cartProduct->price}} EUR X {{$cartProduct->count}}</h6>
                <button class="svg" type="submit">
                    <svg>
                        <use xlink:href="#bin"></use>
                    </svg>
                </button>
                @csrf
            </form>
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
@endif