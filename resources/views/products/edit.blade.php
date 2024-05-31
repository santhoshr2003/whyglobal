@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label">{{ __('Product Image') }}</label>
                            <input type="file" class="form-control" id="product_image" name="product_image">
                            @if ($product->product_image)
                            <img src="{{ asset($product->product_image) }}" width="100" height="100" alt="{{ $product->name }}" class="img-fluid mb-3">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">{{ __('Price') }}</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
