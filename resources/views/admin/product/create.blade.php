@extends('layout.admin', ['title' => 'Create item'])

@section('content')
    <h1>Create item</h1>
    <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
        @include('admin.product.part.form')
    </form>
@endsection
