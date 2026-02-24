@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">


@section('title', 'Add Product')

@section('content')
<div class="product-form-container">
  <h1>Add New Product</h1>
  @if ($errors->any())
    <div class="error-box">
      <ul>
        @foreach ($errors->all() as $error)
          <li class="error-text">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Product Name:</label>
      <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" name="price" id="price" step="0.01" required>
    </div>
    <div class="form-group">
      <label for="category">Category:</label>
      <select name="category" id="category" required>
        <option value="">Select Category</option>
        <option value="Eastern">Eastern</option>
        <option value="Western">Western</option>
        <option value="Appetizers">Appetizers</option>
        <option value="Hot Drinks">Hot Drinks</option>
        <option value="Cold Drinks">Cold Drinks</option>
        <option value="Sweets">Sweets</option>
      </select>
    </div>
    <div class="form-group">
      <label for="image">Product Image:</label>
      <input type="file" name="image" id="image" accept="image/*" required>
    </div>
    <button type="submit" class="submit-btn">Add Product</button>
  </form>
</div>
@endsection
