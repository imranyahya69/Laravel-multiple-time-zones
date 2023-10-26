@extends('layouts.app')

@section('content')
    <h1>Order Listing</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>View Details</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->title }}</td>
                    <td>{{ $order->description }}</td>
                    <td>{{ $order->status }}</td>
                    <td> <a href="{{ route('orders.show', $order) }}" class="btn btn-primary">View Details</a></td>
                    <td>
                        @if ($order->status === 'pending')
                            <form method="POST" action="{{ route('order.accept', $order) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
