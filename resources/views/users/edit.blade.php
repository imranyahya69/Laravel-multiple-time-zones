@extends('layouts.app')

@section('content')
    <h1>Edit Your Timezone</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('user.update') }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="timezone">Timezone:</label>
            <select name="timezone" class="form-control">
                @foreach ($timezones as $tz)
                    <option value="{{ $tz }}" {{ $user->timezone === $tz ? 'selected' : '' }}>{{ $tz }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Timezone</button>
    </form>
@endsection
