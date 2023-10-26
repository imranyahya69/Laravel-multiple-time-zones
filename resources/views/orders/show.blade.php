@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>

    <p><strong>Title:</strong> {{ $order->title }}</p>
    <p><strong>Description:</strong> {{ $order->description }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    @if ($order->status === 'accepted')
        <p><strong>Accepted By:</strong> {{ $order->acceptedBy->name }}</p>
        <p><strong>Accepted At ({{ Auth::user()->timezone }} Timezone):</strong>
            {{ $order->accepted_at->setTimezone(Auth::user()->timezone) }}</p>
        <p><strong>Deadline Date ({{ Auth::user()->timezone }} Timezone):</strong>
            {{ $order->deadline_at->setTimezone(Auth::user()->timezone) }}</p>
    @endif

    <p><strong>User's Timezone:</strong> {{ Auth::user()->timezone }}</p>

    @php
        $userCreatedAtString = $userUpdatedAtString = null;
        $createdAt = '2023-10-26 04:00:47';

        $carbonCreatedAt = Carbon\Carbon::parse($createdAt, $order->user->timezone);
        $carbonUpdatedAt = Carbon\Carbon::parse($createdAt, $order->user->timezone);

        $userTimeZone = auth()->user()->timezone;

        $userCreatedAt = $carbonCreatedAt->setTimezone($userTimeZone);
        $userUpdatedAt = $carbonUpdatedAt->setTimezone($userTimeZone);

        $userCreatedAtString = $userCreatedAt->format('Y-m-d H:i:s');
        $userUpdatedAtString = $userUpdatedAt->format('Y-m-d H:i:s');
    @endphp

    <p><strong>Created At ({{ Auth::user()->timezone }} Timezone):</strong>
        {{ $userCreatedAtString }}</p>
    <p><strong>Updated At ({{ Auth::user()->timezone }} Timezone):</strong>
        {{ $userUpdatedAtString }}</p>
    </div>
@endsection
