@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-3">
            <a href="{{ route('users.index') }}">
                <button class="btn btn-primary btn-block">users</button>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admins.index') }}">
                <button class="btn btn-primary btn-block">admins</button>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('reservations.index') }}">
                <button class="btn btn-primary btn-block">Reservations</button>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.products.index') }}">
                <button class="btn btn-primary btn-block">Menu Management</button>
            </a>
        </div>
    </div>
</div>
<style>
    body {
        background-image: url('{{ asset('logo/background.svg') }}'); 
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat;
        background-attachment: fixed; 
    }
</style>
