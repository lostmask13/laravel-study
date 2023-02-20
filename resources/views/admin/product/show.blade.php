@extends('layout.admin', ['title' => 'Show item  '])

@section('content')
    <h1>Show item</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Slug:</strong> {{ $product->slug }}</p>
            <p><strong>Brand:</strong> {{ $product->brand->name }}</p>
            <p><strong>New:</strong> @if($product->new) yes @else not @endif</p>
            <p><strong>Hit:</strong> @if($product->hit) yes @else not @endif</p>
            <p><strong>Last item:</strong> @if($product->sale) yes @else not @endif</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('img/' . $product->image) }}" alt="" class="img-fluid">
        </div>
        <div class="row">
            <div class="col-12">
                <p><strong>Describe</strong></p>
                @isset($product->content)
                    <p>{{ $product->content }}</p>
                @else
                    <p>Describe is absent</p>
                @endisset
                <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}"
                   class="btn btn-success">
                    Edit item
                </a>
                <form method="post" class="d-inline" onsubmit="return confirm('Delete item?')"
                      action="{{ route('admin.product.destroy', ['product' => $product->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Delete item
                    </button>
                </form>
            </div>
        </div>
@endsection
