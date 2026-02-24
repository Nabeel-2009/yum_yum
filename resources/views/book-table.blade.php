@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/book-table.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@section('title', 'Book a Table')

@section('content')
<div class="booking-container">
    <div class="title">
        <h1>Book a Table</h1>
    </div>
    <form method="POST" action="{{ route('book-table') }}">
        @csrf
        <h3>Choose Location:</h3>
        <input type="hidden" name="location" id="location" value="indoor">
        <div class="location-selection">
            <button type="button" onclick="selectLocation('indoor')">
                <img src="{{ asset('Products/Location/Indoor.jpg') }}" alt="Indoor">
                <div class="hover-text">Indoor</div>
            </button>
            <button type="button" onclick="selectLocation('outdoor')">
                <img src="{{ asset('Products/Location/Outdoor.jpg') }}" alt="Outdoor">
                <div class="hover-text">Outdoor</div>
            </button>
        </div>
        <br><br>
        <div class="form-group">
            <div>
                <label for="booking_time">Booking Time:</label>
                <input type="datetime-local" name="booking_time" id="booking_time" required>
            </div>
            <div>
                <label for="persons_count">Number of Persons:</label>
                <input type="number" name="persons_count" id="persons_count" min="1" max="12" required>
            </div>
        </div>
        <br><br>
        <button type="submit" class="submit-btn">Book Now</button>
    </form>
</div>

<script>
function selectLocation(loc) {
    document.getElementById('location').value = loc;
    alert("Selected: " + (loc === 'indoor' ? "Indoor" : "Outdoor"));
}
</script>

@endsection
