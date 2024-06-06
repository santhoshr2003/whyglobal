@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-secondary text-white">{{ __('Product Details') }}</div>

                <div class="card-body">
                    @if ($product->product_image)
                        <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}" class="img-fluid mb-3 rounded">
                    @else
                        <p class="text-muted">No Image</p>
                    @endif
                    <p><strong>Name:</strong> {{ $product->name }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    <p><strong>Price:</strong> {{ $product->price }}</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        margin-top: 20px;
        padding: 20px;
    }
    .card-header {
        font-size: 1.5rem;
    }
    .card-body p {
        font-size: 1.1rem;
    }
    .btn {
        display: block;
        width: 100px;
        margin: auto;
    }
    .container {
        padding: 20px;
    }
</style>
@endsection
