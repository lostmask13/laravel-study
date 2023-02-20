@extends('layout.site', ['title' => 'Make an order'])

@section('content')
    <h1 class="mb-4">Make an order</h1>
    @if ($profiles && $profiles->count())
        @include('basket.select', ['current' => $profile->id ?? 0])
    @endif
    <form method="post" action="{{ route('basket.saveorder') }}" id="checkout">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name, Surname"
                   required maxlength="255" value="{{ old('name') ?? $profile->name ?? '' }}">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="E-mail"
                   required maxlength="255" value="{{ old('email') ?? $profile->email ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone"
                   required maxlength="255" value="{{ old('phone') ?? $profile->phone ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address"
                   required maxlength="255" value="{{ old('address') ?? $profile->address ?? '' }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="comment" placeholder="Comments"
                      maxlength="255" rows="2">{{ old('comment') ?? $profile->comment ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Make an order</button>
        </div>
    </form>
@endsection
