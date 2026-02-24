@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/admin_register.css') }}">

@section('title', 'Admin Register')

@section('content')
<div class="login-container">
  <div class="title">
    <h1>Admin Registration</h1>
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
  <form method="POST" action="{{ route('admin.register') }}">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
    </div>
    <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>
    <button type="submit" class="submit-btn">Register</button>
  </form>
  <a href="{{ route('admin.login') }}" class="extra-link">login to account</a>
</div>
@endsection
