<header>
    <div class="collapse bg-dark" id="miniCart">
        @include('front.cart.mini')
    </div>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Menu</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{route('front.index')}}" class="text-white">Home</a></li>
                        <li><a href="{{route('cart.view')}}" class="text-white">View Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg class="top-logo">
                    <use xlink:href="#logo"></use>
                </svg>
            </a>
            <div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @if(!isset($pageData->hideMiniCart))
                <button class="cart navbar-toggler" type="button" data-toggle="collapse" data-target="#miniCart" aria-controls="miniCart" aria-expanded="false" aria-label="Toggle navigation">
                    <svg>
                        <use xlink:href="#cart"></use>
                    </svg>
                    <i><strong>{{$pageData->cartCount}}</strong></i>
                </button>
                @endif
            </div>
        </div>
    </div>
</header>
