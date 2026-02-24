@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">

@section('title', 'Products')

@section('content')
<div class="products-container">
  <h1>Products</h1>
  <a href="{{ route('admin.products.create') }}" class="add-product">Add New Product</a>
  <table class="products-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->category }}</td>
        <td>
          <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
        </td>
        <td>
          <a href="{{ route('admin.products.edit', $product->id) }}" class="edit">Edit</a> |
          <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
