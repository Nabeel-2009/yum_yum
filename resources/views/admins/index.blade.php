@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/admins.css') }}">

@section('title', 'Admins')

@section('content')
<div class="admins-container">
  <h1>Admins</h1>
  <table class="admins-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($admins as $admin)
      <tr>
        <td>{{ $admin->id }}</td>
        <td>{{ $admin->name }}</td>
        <td>{{ $admin->email }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
