<div class="col-md-4 mb-4">
    <div class="card list-item">

        <div class="card-header">
            <a href="{{ route('catalog.brand', ['brand' => $brand->slug]) }}"
               class="name"><h3>{{ $brand->name }}</h3></a>
        </div>

        <a href="{{ route('catalog.brand', ['brand' => $brand->slug]) }}"
           class="btn float-right"> <img src="{{ asset('img/' . $brand->image) }}" alt="" class="img-fluid"></a>
    </div>
</div>
