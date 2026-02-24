@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@section('title', 'Login')

@section('content')
<div class="login-container">
  <div class="title">
    <h1>Login</h1>
  </div>
  @if($errors->any())
  <div class="error-box">
    <ul>
      @foreach ($errors->all() as $error)
        <li class="error-text">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
    </div>
    <button type="submit" class="submit-btn" id="login-btn">Login</button>
  </form>
  <a href="{{ route('register') }}" class="extra-link">Register New account</a>

</div>



<a href="{{ route('admin.access') }}" class="admin-access-btn">Admin Access</a>

@endsection
