<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <x-slot name="header">
            <div class="flex items-center justify-between">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>

                <!-- Nav Buttons -->
                <div class="flex items-center space-x-4">

                    <!-- Add Product  -->
                    <button id="OpenModal"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700 transition">
                        Add New Product
                    </button>

                    <!-- Logout  -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="">
                            {{ __('Log Out') }}
                        </button>
                    </form>

                </div>

            </div>
        </x-slot>

        <!-- Add Product Modal -->
        <div id="productModal"
            class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">

            <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Add New Product</h2>

                <input id="productName"
                    type="text"
                    placeholder="Product name"
                    class="w-full border rounded p-2 mb-4">

                <button id="saveProduct"
                        class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                    Save Product
                </button>

                <button id="closeModal"
                        class="w-full mt-3 bg-gray-300 py-2 rounded hover:bg-gray-400">
                    Cancel
                </button>
            </div>
        </div>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>


</body>
</html>