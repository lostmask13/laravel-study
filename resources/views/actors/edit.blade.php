@extends('layout')

@section('title', 'Edit Actor')

@section('content')
    <div class="row">
        <h5>Edit Actor</h5>
        <form action="{{ route('actors.edit', ['actor' => $actor->id]) }}" method="post">
            @csrf

            <div class="form-group my-2">
                <label for="first_name">{{__('validation.attributes.first_name') }}</label>
                <input id="first_name" value="{{ old('first_name', $actor->first_name) }}" placeholder="First name"
                       name="first_name" type="text"
                       class="form-control @error('first_name') is-invalid @enderror">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="last_name">{{__('validation.attributes.last_name') }}</label>
                <input id="last_name" value="{{ old('last_name', $actor->last_name) }}" placeholder="Last name"
                       name="last_name" type="text"
                       class="form-control @error('last_name') is-invalid @enderror">
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="patronymic">{{__('validation.attributes.patronymic') }}</label>
                <input id="patronymic" value="{{ old('patronymic', $actor->patronymic) }}" placeholder="Patronymic"
                       name="patronymic" type="text"
                       class="form-control @error('patronymic') is-invalid @enderror">
                @error('patronymic')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="date_of_birth">{{__('validation.attributes.date_of_birth') }}</label>
                <input id="date_of_birth" value="{{ old('date_of_birth', $actor->date_of_birth) }}"
                       placeholder="date_of_birth" name="date_of_birth" type="date"
                       class="form-control @error('date_of_birth') is-invalid @enderror">
                @error('date_of_birth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="growth">{{__('validation.attributes.growth') }}</label>
                <input id="growth" value="{{ old('growth', $actor->growth) }}" placeholder="Growth" name="growth"
                       type="number"
                       class="form-control @error('growth') is-invalid @enderror">
                @error('growth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary my-2">Edit</button>
        </form>
    </div>
@endsection
