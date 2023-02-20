@extends('layout.site', ['title' => 'Brands'])

@section('content')
    <h1>Brands</h1>

    <p>Our products are made from high-grade materials.
        Each piece created by skilled artisans using the best modern tehnologies.</p>

    <h2 class="mb-4">Brands</h2>
    <div class="row">
        @foreach ($brands as $brand)
            @include('catalog.part.brand', ['brand' => $brand])
        @endforeach
    </div>

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


