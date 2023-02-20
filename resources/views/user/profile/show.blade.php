@extends('layout.site', ['title' => 'Profile information'])

@section('content')
    <h1>Profile information</h1>

    <p><strong>Profile name:</strong> {{ $profile->title }}</p>
    <p><strong>Name, surname:</strong> {{ $profile->name }}</p>
    <p>
        <strong>E-mail:</strong>
        <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
    </p>
    <p><strong>Phone:</strong> {{ $profile->phone }}</p>
    <p><strong>Address:</strong> {{ $profile->address }}</p>
    @isset ($profile->comment)
        <p><strong>Comments:</strong> {{ $profile->comment }}</p>
    @endisset

    <a href="{{ route('user.profile.edit', ['profile' => $profile->id]) }}"
       class="btn btn-primary">
        Edit profile
    </a>
    <form method="post" class="d-inline" onsubmit="return confirm('Delete profile?')"
          action="{{ route('user.profile.destroy', ['profile' => $profile->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            Delete profile
        </button>
    </form>
@endsection
