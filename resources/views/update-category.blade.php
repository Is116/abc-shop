@extends('dashboard')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <form method="POST" action="{{ route('api.categories.update', $category->id) }}" class="mb-6 mt-6 ml-4 mr-4">
        @csrf
        @method('PUT')
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <div class="mb-6">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
            <input type="text" name="name" id="category" value="{{ $category->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            @error('name')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="text-black bg-orange-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Update Category</button>
    </form>
</div>
@endsection
