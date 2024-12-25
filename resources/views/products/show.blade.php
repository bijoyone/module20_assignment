@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Details</h1>

    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            <p><strong>Stock:</strong> {{ $product->stock ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $product->description ?? 'No description available' }}</p>
            @if ($product->image)
                <div>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 300px;">
                </div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </div>
    </div>
</div>
@endsection