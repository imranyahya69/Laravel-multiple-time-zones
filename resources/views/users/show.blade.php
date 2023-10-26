@extends('layouts.app')

@section('content')
    <h1>User Profile</h1>

    <div>
        {{-- @dd($user->name) --}}
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Timezone:</strong> {{ $user->timezone }}</p>
        <p><strong>Current Time:</strong> {{ now()->setTimezone($user->timezone)->format('Y-m-d H:i:s') }}</p>
    </div>
@endsection