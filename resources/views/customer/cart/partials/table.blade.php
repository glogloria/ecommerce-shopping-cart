<table class="table">
    <thead>
        <tr>
            <th>SKU</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($items as $item) 
            <tr>
                <td>{{ number_format($item->product->sku) }}</td>
                <td>{{ $item->product->name }}</td>
                <td>${{ number_format($item->product->price, 2) }}</td>
                <td>{{ number_format($item->product->quantity) }}</td>

                <td>
                    <form action="{{ route('cart.remove', $item->product->id )}}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>