@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>{{ $product->name }}</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 position-relative">
                            <div class="position-absolute">
                                @if($product->new)
                                    <span class="badge badge-success text-white ml-1">New arrivals</span>
                                @endif
                                @if($product->hit)
                                    <span class="badge badge-success text-white ml-1">Hit!</span>
                                @endif
                                @if($product->sale)
                                    <span class="badge badge-success text-white ml-1">Last item</span>
                                @endif
                            </div>
                            <img src="{{ asset('img/' . $product->image) }}" alt="" class="img-fluid">
                        </div>

                        <div class="col-lg-6 position-relative">
                            <p class="mt-4 mb-0">{{ $product->content }}</p>
                        </div>

                        <div class="card-footer col-md-12">
                            <p>Price: {{ number_format($product->price, 2, '.', '') }}</p>
                            <form action="{{ route('basket.add', ['id' => $product->id]) }}"
                                  method="post" class="form-inline add-to-basket">
                                @csrf
                                <label for="input-quantity">Quantity</label>
                                <input type="text" name="quantity" id="input-quantity" value="1"
                                       class="form-control mx-2 w-25">
                                <button type="submit" class="btn btn-primary">
                                    Add to cart
                                    <span class="fa fa-shopping-cart"></span>
                                </button>
                            </form>
                            <p></p>
                            @isset($product->brand)
                                Brand -
                                <a href="{{ route('catalog.brand', ['brand' => $product->brand->slug]) }}">
                                    {{ $product->brand->name }}
                                </a>
                            @endisset
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

