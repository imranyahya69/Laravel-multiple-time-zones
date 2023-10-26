@extends('layouts.app')

@section('content')
    <h1>Create Order</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('order.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
@endsection
