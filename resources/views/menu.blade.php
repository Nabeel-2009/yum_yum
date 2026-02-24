@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">

@section('title', 'Menu Sections')

@section('content')
<h1 class="page-title">Menu</h1>

@php
  $categories = ['Eastern', 'Western', 'Appetizers', 'Hot Drinks', 'Cold Drinks', 'Sweets'];
@endphp

@foreach($categories as $category)
  @php
    $productsInCategory = $products->where('category', $category);
    $sectionId = strtolower(str_replace(' ', '-', $category));
  @endphp
  <section id="{{ $sectionId }}" class="section">
    <h2>{{ strtolower($category) }}</h2>
    <div class="cards-container">
      @foreach($productsInCategory as $product)
        <div class="card">
          <div class="container">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="product-img">
            <div class="overlay">
              <div class="overlay-text">
                <h3>{{ $product->name }}</h3>
              </div>
              <div class="overlay-price">
                <p class="new">${{ $product->price }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endforeach
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
});
</script>
@endsection
