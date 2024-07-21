@extends('layouts.frontend')
@section('title')
Welcome To raw & rare
@endsection
@section('content')
<style>
        .hero-section {
            background: url('https://example.com/hero-image.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            {{--  height: 100vh;  --}}
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        .product-card img {
            height: 200px;
            object-fit: cover;
        }
        .product-card {
            border: 1px solid #e0e0e0;
            margin-bottom: 2rem;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
            text-align: center;
        }
    </style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1>Discover Elegant Rings and Lockets</h1>
        <p>Find the perfect piece to complement your style.</p>
        <a href="{{ url('user-items') }}" class="btn btn-success btn-lg">Shop Now</a>
    </div>
</div>


<!-- About Us Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">About Us</h2>
    <p class="text-center">We are passionate about providing high-quality rings and lockets that suit your style and personality. Each piece in our collection is carefully selected to ensure it meets our standards of beauty and craftsmanship.</p>
</div>



@endsection
