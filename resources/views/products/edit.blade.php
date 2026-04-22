<x-app-layout>
    <div class="container mt-5">

        <h2>Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">

                @if ($product->image)
                    <img src="/storage/{{ $product->image }}" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <button class="btn btn-primary">Save Changes</button>
        </form>

    </div>
</x-app-layout>
