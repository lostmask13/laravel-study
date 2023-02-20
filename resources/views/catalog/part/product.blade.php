<div class="col-md-4 mb-4">
    <div class="card list-item">
        <div class="card-header">
            <a href="{{ route('catalog.product', ['product' => $product->slug]) }}"
               class="name"><h3>{{ $product->name }}</h3></a>
        </div>
        <div class="card-body p-0 position-relative">
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
            <a href="{{ route('catalog.product', ['product' => $product->slug]) }}"
               class="btn float-right"> <img src="{{ asset('img/' . $product->image) }}" alt="" class="img-fluid"></a>
            <p class="text-center">Price: {{ number_format($product->price, 2, '.', '') }}</p>
        </div>

        <div class="card-footer text-center">
            <form action="{{ route('basket.add', ['id' => $product->id]) }}"
                  method="post" class="d-inline add-to-basket">
                @csrf
                <button type="submit" class="btn btn-primary">Add to cart
                    <span class="fa fa-shopping-cart"></span></button>
            </form>
        </div>
    </div>
</div>
