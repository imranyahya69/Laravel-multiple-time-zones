@extends('layouts.app')

@section('content')
    <h1>List of Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Timezone</th>
                <th>Current Time (User's Timezone)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->timezone }}</td>
                    <td>
                        {{ \Carbon\Carbon::now()->setTimezone($user->timezone)->format('Y-m-d H:i:s') }}
                    </td>
                    <td>
                        <a href="{{ route('user.show', $user) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
