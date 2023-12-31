@extends('layouts.app')

@section('title', __('New Deposit'))

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card my-4">
                <div class="card-header">
                    <h4 class="card-title">{{ __('New Deposit') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('deposit.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label class="form-label" for="date">{{ __('Date') }}</label>
                            <input type="date" step="any" id="date" class="form-control" name="date"
                                value="{{ old('date') ?? date('Y-m-d') }}" />
                            @error('date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label class="form-label" for="amount">{{ __('Amount') }}</label>
                            <input type="number" step="any" id="amount" class="form-control" name="amount"
                                value="{{ old('amount') }}" />
                            @error('amount')
                                <div class="text-danger">
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
