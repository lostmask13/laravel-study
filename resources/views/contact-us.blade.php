@extends('layout')

@section('title', 'Contact us')

@section('content')
    <form method="post">
        <div class="mb-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Phone number</label>
            <input type="text" class="form-control" id="password" placeholder="Phone number">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
