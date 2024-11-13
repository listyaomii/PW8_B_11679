<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Laptop Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-md mx-auto px-6 lg:px-8">
            
            <div class="flex justify-center mb-6">
                <a href="{{ route('laptop') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">See All Laptops</a>
            </div>

            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
                <h3 class="text-center text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-6">Add Laptop Details</h3>

                <form action="{{ route('store-laptop') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Laptop Image</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Laptop Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Enter Laptop name" required>
                    </div>

                    <div class="mb-4">
                        <label for="release_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Release Year</label>
                        <input type="number" name="release_year" id="release_year" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Enter release year" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Laptop Description</label>
                        <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Enter laptop description" required></textarea>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded w-full sm:w-auto">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
