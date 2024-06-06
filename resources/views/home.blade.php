@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-center">{{ __('You are logged in!') }}</p>

                    @section('content')
                    <div class="container my-4">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header bg-secondary text-white">{{ __('Products') }}</div>

                                    <div class="card-body">
                                        @can('create', App\Models\Product::class)
                                            <div class="d-flex justify-content-end mb-3">
                                                <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
                                            </div>
                                        @endcan

                                        <table class="table table-striped table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                <tr>
                                                    <td>
                                                        @if ($product->product_image)
                                                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}" width="100" class="img-thumbnail">
                                                        @else
                                                            <span class="text-muted">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->description }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td class="d-flex">
                                                        @can('view', $product)
                                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm mr-2">View</a>
                                                        @endcan
                                                        @can('update', $product)
                                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
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
                                    {{-- <div class="d-flex justify-content-center">
                                        {{ $products->links() }}
                                    </div> --}}
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

<style>
    .card {
        margin-top: 20px;
    }
    .table thead th {
        background-color: #343a40;
        color: white;
    }
    .btn {
        margin-right: 5px;
    }
    .container {
        padding: 20px;
    }
</style>
@endsection
