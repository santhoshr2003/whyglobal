@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Details') }}</div>

                <div class="card-body">
                    @if ($product->product_image)
                        <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}" class="img-fluid mb-3">
                    @else
                        <p>No Image</p>
                    @endif
                    <p><strong>Name:</strong> {{ $product->name }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    <p><strong>Price:</strong> {{ $product->price }}</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
