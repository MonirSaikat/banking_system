@extends('layouts.auth')

@section('title', __('Login'))

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h4 class="card-title">{{ __('Login') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label" for="email">{{ __('Email') }}</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" />
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <input type="password" id="password" class="form-control" name="password" />
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary my-3 d-block">{{ __('Login') }}</button>

                <a href="{{ route('users.create') }}">{{ __('New account') }} ?</a>
            </form>
        </div>
    </div>


@endsection
