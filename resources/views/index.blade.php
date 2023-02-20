@extends('layout.site')

@section('content')
    <h1>Shop</h1>
    <p>
        In our online store you will find a wide range of quality products.
        Jump at this opportunity to purchase excellent goods without having to overpay.
        Join dozens of happy customers!
    </p>

    @if($new->count())
        <h2>New arrivals</h2>
        <div class="row">
            @foreach($new as $item)
                @include('catalog.part.product', ['product' => $item])
            @endforeach
        </div>
    @endif

    @if($hit->count())
        <h2>Hit!</h2>
        <div class="row">
            @foreach($hit as $item)
                @include('catalog.part.product', ['product' => $item])
            @endforeach
        </div>
    @endif

    @if($sale->count())
        <h2>Last item</h2>
        <div class="row">
            @foreach($sale as $item)
                @include('catalog.part.product', ['product' => $item])
            @endforeach
        </div>
    @endif

    <div class="w3ls-fsocial-grid">
        <h3 class="sub-w3ls-headf">Follow Us</h3>
        <div class="social-ficons">
            <ul>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Telegram</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
    </div>

@endsection


