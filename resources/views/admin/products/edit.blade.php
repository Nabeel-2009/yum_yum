@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">


@section('title', 'Edit Product')

@section('content')
<div class="product-form-container">

<h1>Edit Product</h1>
@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div  class="form-group">
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required>
    </div>
    <div  class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}" required>
    </div>
    <div  class="form-group">
        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="">Select Category</option>
            <option value="Eastern" {{ $product->category == 'Eastern' ? 'selected' : '' }}>Eastern</option>
            <option value="Western" {{ $product->category == 'Western' ? 'selected' : '' }}>Western</option>
            <option value="Appetizers" {{ $product->category == 'Appetizers' ? 'selected' : '' }}>Appetizers</option>
            <option value="Hot Drinks" {{ $product->category == 'Hot Drinks' ? 'selected' : '' }}>Hot Drinks</option>
            <option value="Cold Drinks" {{ $product->category == 'Cold Drinks' ? 'selected' : '' }}>Cold Drinks</option>
            <option value="Sweets" {{ $product->category == 'Sweets' ? 'selected' : '' }}>Sweets</option>
        </select>
    </div>
    <div  class="form-group">
        <label for="image">Product Image:</label>
        <input type="file" name="image" id="image" accept="image/*">
        @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
        @endif
    </div>
    <button type="submit" class="submit-btn">Update Product</button>
</form>
</div>
@endsection
