@extends('layouts.customer')

@section('content')
    <div class="content">
        <h1 class="greeting"> Hi, {{ auth()->user()->name }} </h1>
        
        <div class="max-w-4xl mx-auto mt-10">
            <h1 class="text-2xl font-bold mb-6">Your Orders</h1>

            @if ($orders->isEmpty())
                <p class="text-gray-600">You have no orders yet.</p>
            @else
                <div class="space-y-6">
                    @foreach ($orders as $order)
                        <div class="bg-white shadow rounded p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">
                                    Order #{{ $order->id }}
                                </h2>

                                <a href="{{ route('orders.show', $order->id) }}"
                                class="text-blue-600 hover:underline">
                                    View Details
                                </a>
                            </div>

                            <ul class="divide-y">
                                @foreach ($order->items as $item)
                                    <li class="py-2 flex justify-between">
                                        <span>{{ $item->product->name }}</span>
                                        <span>${{ number_format($item->product->price, 2) }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="mt-4 text-right font-bold">
                                Total: ${{ number_format($order->total, 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection