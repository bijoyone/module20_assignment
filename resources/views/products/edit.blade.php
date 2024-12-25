@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="text" name="product_id" value="{{ $product->product_id }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            @if ($product->image)
                <div>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control mt-2">
        </div>
		
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
        </div>



        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection