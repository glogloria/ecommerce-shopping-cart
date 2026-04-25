<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($items as $item) 
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>${{ number_format($item->product->price, 2) }}</td>

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