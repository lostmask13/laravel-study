@extends('layout.admin', ['title' => 'Create brand'])

@section('content')
    <h1>Create brand</h1>
    <form method="post" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.brand.part.form')
    </form>
@endsection
