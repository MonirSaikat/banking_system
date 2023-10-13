@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')

    <div class="card mb-3">
        <div class="card-body">
            {{ __('Hello') }},
            {{ auth()->user()->name }}
            {{ __(' your current balance is ') }}
            {{ auth()->user()->balance ?? 0 }}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Transaction List') }}</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Date') }}</th>
                            <th scope="col">{{ __('Amount') }}</th>
                            <th scope="col">{{ __('Fee') }}</th>
                            <th scope="col">{{ __('Type') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->date }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->fee }}</td>
                                <td>{{ $transaction->transaction_type }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="5">{{ __('No tranaction to show') }}</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{ $transactions->links() }}
        </div>
    </div>

@endsection
