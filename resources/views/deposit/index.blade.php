@extends('layouts.app')

@section('title', __('Deposit List'))

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Deposit List') }}</h4>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->date }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->fee }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">{{ __('No tranaction to show') }}</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{ $transactions->links() }}
        </div>
    </div>

@endsection
