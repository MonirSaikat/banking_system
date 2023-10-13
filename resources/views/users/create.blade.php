@extends('layouts.auth')

@section('title', __('Register'))

@section('content')
    <div class="card my-3">
        <div class="card-header">
            <h4 class="card-title">{{ __('Register') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label" for="name">{{ __('Account Type') }}</label>
                    <select name="account_type" id="account_type" class="form-control">
                        <option value="">{{ __('Select account type') }}</option>
                        <option value="Individual">{{ __('Individual') }}</option>
                        <option value="Business">{{ __('Business') }}</option>
                    </select>
                    @error('account_type')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="name">{{ __('Name') }}</label>
                    <input type="name" id="name" class="form-control" name="name" value="{{ old('name') }}" />
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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

                <div class="form-group mb-2">
                    <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" />
                    @error('password_confirmation')
                        <div class="text-danger">
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
