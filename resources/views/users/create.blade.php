@extends('layouts.auth')

@section('title', __('Register'))

@section('content')
    <div class="card my-4">
        <div class="card-header">
            <h4 class="card-title">{{ __('Register') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label" for="name">{{ __('Name') }}</label>
                    <input type="email" id="name" class="form-control" name="name" value="{{ old('name') }}" />
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="email">{{ __('Email') }}</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <input type="password" id="password" class="form-control" name="password" />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary my-3 d-block">{{ __('Register') }}</button>

                <a href="{{ route('users.create') }}">{{ __('New account') }} ?</a>
            </form>
        </div>
    </div>


@endsection