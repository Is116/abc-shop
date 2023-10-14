@extends('dashboard')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <form method="POST" action="{{ route('api.products.store') }}" class="mb-6 mt-6 ml-4 mr-4">
        @csrf

        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter product name" required>
    
            @error('name')
            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter product price" required>
    
            @error('price')
            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
            <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    
        @error('category_id')
        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
        @enderror
    
        <button type="submit" class="text-black bg-orange-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
    </form>
    

    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        @foreach ($products as $product)
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">{{ $product->name }}</td>
                <td class="px-6 py-4">{{ $product->price }}</td>
                <td class="px-6 py-4">{{ $product->category->name }}</td>
                <td class="px-6 py-4">
                    <a class="font-medium text-blue-600" href="{{ route('product.update', ['product_id' => $product->id]) }}">Edit</a>
                    <form method="POST" action="{{ route('api.products.destroy', $product->id) }}" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
