@extends('layouts.app')

@section('content')

<style>
    .quantity-selector {
    display: flex;
    align-items: center;
}

.quantity-selector .quantity-change {
    padding: 5px 10px;
    border: 1px solid #ddd;
    cursor: pointer;
}

.quantity-selector input {
    text-align: center;
    padding: 5px;
    margin: 0 5px;
    border: 1px solid #ddd;
    width: 50px;
}
</style>

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col-2"><i class="fas fa-bars"></i> <span class="btn btn-secondary">Marketplace</span></div>
        <div class="col-8 d-flex"><input type="search" class="form-control"><i class="fas fa-search"></i></div>
        <div class="col-2 text-end"><span class="btn btn-secondary"><i class="fas fa-home"></i></span></div>
    </div>
    <div class="card-body">
        <h1>Shopping Bag</h1>

        @php
            $totalAmount = 0;
        @endphp

        @foreach ($orders as $order)
        <div class="row my-3">
            <div class="col-1">
                <img class="border border-5 rounded-4" src="https://scontent.fmnl9-4.fna.fbcdn.net/v/t39.30808-6/355459684_995658415192585_5242516178701158225_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeG7uCcEq9_G6hvBmwZDugTI5f3TgIY7Z6fl_dOAhjtnp027VQ4J47mjO2sx0b-GgdJbZWvTx-Nu9mBm7e85-cJW&_nc_ohc=cVbvfYYhG1gAX9P7-br&_nc_ht=scontent.fmnl9-4.fna&oh=00_AfB6MbqwxJxXHW_y2ycXBl3mkeAjW_mfXmL3OW3G9ewCXw&oe=655F6368" alt="img" height="120" width="130">
            </div>
            <div class="col-4">
                <p class="mt-3">{{ $order->product->product_description }}</p>
            </div>
            <div class="col-3">
                <form id="quantity-form" action="{{ route('order.changeQuantity', $order->id) }}" method="post">
                    @csrf <!-- CSRF token for Laravel -->
                    <div class="quantity-selector text-center mt-3" style="margin-left: 40%">
                        <button type="button" class="quantity-change" data-type="minus">-</button>
                        <input type="number" id="quantity" name="quantity" value="{{ $order->quantity }}" min="0">
                        <button type="button" class="quantity-change" data-type="plus">+</button>
                    </div>
                </form>
            </div>
            <div class="col-2 text-center">
                <p class="mt-4"><strong>P {{ $order->total }}</strong></p>
            </div>
            <div class="col-2">
                <a href="{{ route('shipping.index', $order->id) }}" class="mb-2 mt-3  border-0" style="background: #ddd; padding-left: 30px; padding-right: 32px; text-decoration: none; color: black">Order</a> <br>
                <button class="  border-0" style="background: #ddd; padding-left: 30px; padding-right: 30px">Delete</button>
            </div>
        </div>
        @php
            $totalAmount += $order->total;
        @endphp
        @endforeach

        {{-- Pagination Links --}}
        <div class="row">
            <div class="col-12">
                {{ $orders->links() }}
            </div>
        </div>
        <br>
        <hr>
        <br>

        <div class="row">
            <div class="col-5"></div>
            <div class="col-3 text-end"><strong>Total Price</strong></div>
            <div class="col-2 text-center" id="totalPrice"><strong style="color: #FF2500">P {{ number_format($totalAmount, 2) }}</strong></div>
            <div class="col-2"></div>
        </div>

        {{-- <div class="row mt-5">
            <div class="col-5"></div>
            <div class="col-2"></div>
            <button class="btn rounded-5 col-5 text-white" style="background: #55AAAD"><strong>Checkout</strong></button>
        </div> --}}

    </div>
    <script>
        document.querySelectorAll('.quantity-change').forEach(function(button) {
    button.addEventListener('click', function(e) {
        var input = document.getElementById('quantity');
        var currentValue = parseInt(input.value);
        var type = this.getAttribute('data-type');

        if (type === 'minus' && currentValue > 1) {
            input.value = currentValue - 1;
        } else if (type === 'plus') {
            input.value = currentValue + 1;
        }

        // Submit the form
        document.getElementById('quantity-form').submit();
    });
});

    </script>
</div>
@endsection
