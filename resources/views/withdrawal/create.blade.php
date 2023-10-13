@extends('layouts.app')

@section('title', __('New Withdrawal'))

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card my-4">
                <div class="card-header">
                    <h4 class="card-title">{{ __('New Withdrawal') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('withdrawal.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label class="form-label" for="amount">{{ __('Amount') }}</label>
                            <input type="number" step="any" id="amount" class="form-control" name="amount"
                                value="{{ old('amount') }}" />
                            @error('amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary my-3 d-block">{{ __('Submit') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
