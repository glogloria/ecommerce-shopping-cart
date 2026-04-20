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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard!') }}
            </h2>
            <ul>
                <button id="OpenModal"><i class="fa-solid fa-plus">Add Product</i></button>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="#!">View Orders</a></li>
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </ul>
        </x-slot>

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