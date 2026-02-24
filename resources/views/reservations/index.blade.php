@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/reservations.css') }}">

@section('title', 'Reservations')

@section('content')
<div class="reservations-container">
    <div class="reservations-header">
        <h1>Reservations</h1>
    </div>
    <table class="reservations-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Booking Time</th>
                <th>Location</th>
                <th>Number of Persons</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
              $pendingReservations = $reservations->where('status', 'pending');
              $processedReservations = $reservations->whereIn('status', ['accepted', 'rejected']);
            @endphp

            @foreach($pendingReservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->booking_time }}</td>
                <td>{{ $reservation->location }}</td>
                <td>{{ $reservation->persons_count }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <a href="{{ route('reservations.accept', $reservation->id) }}">
                        <button class="action-btn accept" type="button">Accept</button>
                    </a>
                    <a href="{{ route('reservations.reject', $reservation->id) }}">
                        <button class="action-btn reject" type="button">Reject</button>
                    </a>
                </td>
            </tr>
            @endforeach

            @foreach($processedReservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->booking_time }}</td>
                <td>{{ $reservation->location }}</td>
                <td>{{ $reservation->persons_count }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <span>N/A</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
