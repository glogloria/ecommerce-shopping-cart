<x-app-layout>

    <div class="container">

        <h2 class="text-2xl font-bold mb-4">Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div">
                <label class="block font-semibold">Name</label>
                <input type="text" name="name" class="-full border-gray-300 rounded-lg shadow-sm" value="{{ $product->name }}">
            </div>

            <div>
                <label class="block font-semibold">Price</label>
                <input type="number" step="0.01" name="price" class="-full border-gray-300 rounded-lg shadow-sm" value="{{ $product->price }}">
            </div>

             <div>
                <label class="block font-semibold">Quantity</label>
                <input type="number" name="quantity" class="-full border-gray-300 rounded-lg shadow-sm" value="{{ $product->quantity }}">
            </div>


            <div>
                <label class="block font-semibold">Description</label>
                <textarea name="description" class="-full border-gray-300 rounded-lg shadow-sm">{{ $product->description }}</textarea>
            </div>

            <div>
                <label class="block font-semibold">Image</label>
                <input type="file" name="image" class="-full border-gray-300 rounded-lg shadow-sm">

                @if ($product->image)
                    <img src="/storage/{{ $product->image }}" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <button class=" mt-3 bg-gray-300 py-2 rounded hover:bg-gray-400"">Save Changes</button>
        </form>

    </div>
</x-app-layout>
