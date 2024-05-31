@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @section('content')
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Products') }}</div>

                                    <div class="card-body">
                                        @can('create', App\Models\Product::class)
                                            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>
                                        @endcan

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                <tr>
                                                    <td>
                                                        @if ($product->product_image)
                                                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}" width="100">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->description }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>
                                                        @can('view', $product)
                                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                                        @endcan
                                                        @can('update', $product)
                                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                        @endcan
                                                        @can('delete', $product)
                                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    @endsection

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
