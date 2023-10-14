@extends('dashboard')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <form method="POST" action="{{ route('api.categories.store') }}" class="mb-6 mt-6 ml-4 mr-4">
        @csrf
        <div class="mb-6">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
            <input type="text" name="name" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter category name" required>
            @error('name')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="text-black bg-orange-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center">Submit</button>
    </form>    
    
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $category->name }}
                </td>
                <td class="px-6 py-4">
                    <a class="font-medium text-blue-600" href="{{ route('category.update', ['category_id' => $category->id]) }}">Edit</a>
                    <form method="POST" action="{{ route('api.categories.destroy', $category->id) }}" onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
