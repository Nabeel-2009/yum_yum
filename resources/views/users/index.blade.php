@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/users.css') }}">

@section('title', 'Users')

@section('content')
<div class="users-container">
  <h1>Users</h1>
  <table class="users-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
