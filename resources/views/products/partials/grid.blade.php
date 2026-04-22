<div class="row">
    @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($product->image)
                    <img src="/storage/{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                @endif

                <div class="card-body">
                    <div class="container">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h5 class="card-title">{{ $product->sku }}</h5>
                    </diV>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="fw-bold">${{ number_format($product->price, 2) }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
