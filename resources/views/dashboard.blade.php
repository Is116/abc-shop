<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="navbar flex flex-row justify-center space-x-4">
                <a href="{{ route('products.index') }}" class="btn  font-bold py-2 px-4 rounded-full underline">Products</a>
                <a href="{{ route('categories.index') }}" class="btn  font-bold py-2 px-4 rounded-full underline">Categories</a>
            </div>            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
