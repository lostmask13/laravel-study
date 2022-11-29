@extends('layout')

@section('title', 'Add an Actor')

@section('content')

{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">Error!</div>--}}
{{--    @endif--}}

    <div class="row">
        <h5>Add an Actor</h5>
        <form action="{{ route('actors.create') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="first_name" class="form-label">{{__('validation.attributes.first_name') }}</label>
                <input id="first_name" value="{{ old('first_name') }}" placeholder="First name" name="first_name"
                       type="text"
                       class="form-control @error('first_name') is-invalid @enderror">
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="last_name" class="form-label">{{__('validation.attributes.last_name') }}</label>
                <input id="last_name" value="{{ old('last_name') }}" placeholder="Last name" name="last_name"
                       type="text"
                       class="form-control @error('last_name') is-invalid @enderror">
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="patronymic" class="form-label">{{__('validation.attributes.patronymic') }}</label>
                <input id="patronymic" value="{{ old('patronymic') }}" placeholder="Patronymic" name="patronymic"
                       type="text"
                       class="form-control @error('patronymic') is-invalid @enderror">
                @error('patronymic')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="date_of_birth" class="form-label">{{__('validation.attributes.date_of_birth') }}</label>
                <input id="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Date of birth"
                       name="date_of_birth" type="date"
                       class="form-control @error('date_of_birth') is-invalid @enderror">
                @error('date_of_birth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="growth" class="form-label">{{__('validation.attributes.growth') }}</label>
                <input id="growth" value="{{ old('growth') }}" placeholder="Growth" name="growth" type="number"
                       class="form-control @error('growth') is-invalid @enderror">
                @error('growth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Add</button>
        </form>
    </div>

@endsection




