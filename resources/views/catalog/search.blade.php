@extends('layout.site', ['title' => 'Search'])

@section('content')
    <h1>Search</h1>
    <p>Search: {{ $search ?? 'empty' }}</p>
    @if (count($products))
        <div class="row">
            @foreach ($products as $product)
                @include('catalog.part.product', ['product' => $product])
            @endforeach
        </div>
        {{ $products->links() }}
    @else
        <p>Not found</p>
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
