@extends('dashboard')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <form method="POST" action="{{ route('api.products.update', $product->id) }}" class="mb-6 mt-6 ml-4 mr-4">
        @csrf
        @method('PUT')
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            @error('name')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            @error('price')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
            <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="text-black bg-orange-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Update Product</button>
    </form>
</div>
@endsection
