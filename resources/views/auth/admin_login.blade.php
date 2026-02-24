@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@section('title', 'Admin Login')

@section('content')
<div class="login-container">
  <div class="title">
    <h1>Admin Login</h1>
  </div>
  @if($errors->any())
    <div class="error-box">
      <ul>
        @foreach($errors->all() as $error)
          <li class="error-text">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.login') }}" method="POST">
    @csrf
    <div class="form-group">
      <input type="email" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
      <input type="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="submit-btn">Login</button>
  </form>
  <a href="{{ route('admin.register') }}" class="extra-link">Register New Admin</a>
</div>
@endsection
