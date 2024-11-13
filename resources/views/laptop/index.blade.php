<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Laptop') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($laptops as $laptop)
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-4 flex flex-col justify-between">
                           
                            <img src="{{ asset('storage/' . $laptop->image_path) }}" alt="Laptop Image" class="w-full h-40 object-cover rounded">

                          
                            <div class="mt-4">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $laptop->name }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Release Year: {{ $laptop->release_year }}</p>
                                <p class="text-gray-700 dark:text-gray-400 mt-2">{{ $laptop->description }}</p>
                            </div>

                          
                            <form action="{{ route('delete-laptop', $laptop->id) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
