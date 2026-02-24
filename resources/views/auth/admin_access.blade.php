@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/admin_access.css') }}">

@section('title', 'Admin Access')

@section('content')
<div class="admin-access-container">
  <div class="admin-access-card">
    <h1>Enter Admin Code</h1>
    @if($errors->has('admin_code'))
      <div class="error-box">{{ $errors->first('admin_code') }}</div>
    @endif
    <form method="POST" action="{{ route('admin.verify') }}">
      @csrf
      <div class="form-group">
        <label for="admin_code">Admin Code</label>
        <input type="text" name="admin_code" id="admin_code" required>
      </div>
      <button type="submit" class="submit-btn">Verify</button>
    </form>
    <a href="{{ route('login') }}" class="back-link">Return to User Login</a>
  </div>
</div>
@endsection
