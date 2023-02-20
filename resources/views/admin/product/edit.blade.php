@extends('layout.admin', ['title' => 'Edit item'])

@section('content')
    <h1>Edit item</h1>
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.product.update', ['product' => $product->id]) }}">
        @method('PUT')
        @include('admin.product.part.form')
    </form>
@endsection
