<x-app-layout>
    <div class="max-w-7xl mx-auto py-12">
        <h1 class="text-2xl font-bold mb-6">Products</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="border rounded-lg p-4 shadow-sm bg-white">
                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="text-gray-500">{{ $product->sku }}</p>

                    <div class="text-indigo-600 font-bold mt-2">
                        ${{ number_format($product->price, 2) }}
                    </div>

                     <div class="text-indigo-600 font-bold mt-2">
                        ${{ number_format($product->quantity) }}
                    </div>

                    @if ($product->image)
                        <img src="/storage/{{ $product->image }}"
                             class="w-32 h-32 object-cover rounded mt-3 border">
                    @else
                        <div class="w-32 h-32 bg-gray-200 rounded mt-3 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif

                    @if ($product->description)
                        <p class="mt-3 text-gray-700">{{ $product->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
