@extends('layout.admin', ['title' => 'Show brandа'])

@section('content')
    <h1>Show brand</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Name</strong> {{ $brand->name }}</p>
            <p><strong>Slug</strong> {{ $brand->slug }}</p>
            <p><strong>Information</strong></p>
            @isset($brand->content)
                <p>{{ $brand->content }}</p>
            @else
                <p>Describe is not found</p>
            @endisset
        </div>
        <div class="col-md-6">
            @php
                if ($brand->image) {
                    $url = Storage::disk('public')->url('catalog/brand/image/' . $brand->image);
                } else {
                    // $url = Storage::disk('public')->url('catalog/brand/image/' . $brand->image);
                    $url = Storage::disk('public')->url('catalog/brand/image/default.jpg');
                }
            @endphp
            <img src="{{ $url }}" alt="" class="img-fluid">
        </div>
    </div>
    <a href="{{ route('admin.brand.edit', ['brand' => $brand->id]) }}"
       class="btn btn-primary">
        Edit brand
    </a>
    <form method="post" class="d-inline" onsubmit="return confirm('Delete brand?')"
          action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            Delete brand
        </button>
    </form>
@endsection

