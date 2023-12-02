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

        .quantity-selector {
            font-size: 1rem;
            user-select: none;
        }

        .quantity-change {
            color: #fff;
            background-color: #8A8A8A;
            border: none;
            border-radius: 0.25rem;
            padding: 0.25rem 0.5rem;
            margin: 0;
            cursor: pointer;
        }

        .quantity-input {
            text-align: center;
            max-width: 3rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            margin: 0 0.25rem;
        }

        .minus {
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .plus {
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }

        /* Optional: Disable text selection to prevent accidental selection when rapidly changing quantity */
        .quantity-selector * {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Centers buttons horizontally */
        }

        .btn-action {
            display: block;
            background: #ddd;
            border: 0;
            padding: 6px 20px;
            /* Even smaller padding */
            text-align: center;
            text-decoration: none;
            color: black;
            margin-top: 5px;
            /* Smaller space at the top */
            margin-bottom: 5px;
            /* Smaller space at the bottom */
            width: 100%;
            /* Ensures full width */
            box-sizing: border-box;
            /* Ensures padding is included in width */
            font-size: 0.85rem;
            /* Slightly smaller font size */
        }

        /* Ensure the buttons have no space in between */
        .order-button+.delete-button {
            margin-top: 0;
            /* Removes space between buttons */
        }

        /* Optional: Add hover effect for better UX */
        .btn-action:hover {
            background-color: #ccc;
        }
    </style>

    <div class="container-fluid card">
        <div class="card-header row">
            <div class="col-2">
                <div class="dropdown">
                    <button class="btn btn-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-bars" style="font-size: 23px"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3"
                                href="{{ route('shipping.myPurchase') }}" style="background: #55AAAD; color:white; width: 85%">My
                                Purchase</a></li>
                    </ul>
                    <a class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500" href="{{ route('post.index') }}">Marketplace</a>
                </div>
            </div>
            <div class="col-8">
                <!-- Input group -->
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-2 text-end">
                <a class="btn" style="background:#4E6A80" href="{{ url('/') }}"><i class="fas fa-home"
                        style="color: white"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid mt-3">
                <h2>Shopping Bag</h2>
            </div>

            @php
                $totalAmount = 0;
            @endphp
            <div class="container-fluid mt-5">
                @foreach ($orders as $index => $order)
                    <div class="row my-3">
                        <div class="col-2">
                            <div class="form-check d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    style="margin-top: 45px; margin-right:20px;" name="products[{{ $loop->index }}][id]">
                                <img class="border border-5 rounded-4" src="{{ asset('storage/'. $order->product->productImages->first()->image_path) }}"
                                    height="120" width="130">
                            </div>
                        </div>
                        <div class="col-4">
                            <p class="mt-3">{{ $order->product->product_description }}</p>
                        </div>
                        <div class="col-2">
                            <form id="quantity-form-{{ $index }}"
                                action="{{ route('order.changeQuantity', $order->id) }}" method="post">
                                @csrf <!-- CSRF token for Laravel -->
                                <div class="quantity-selector d-inline-block mt-3">
                                    <button type="button" class="quantity-change minus" data-type="minus"
                                        data-index="{{ $index }}">-</button>
                                    <input type="text" class="quantity-input" id="quantity-{{ $index }}"
                                        name="quantity" value="{{ $order->quantity }}" min="0" readonly>
                                    <button type="button" class="quantity-change plus" data-type="plus"
                                        data-index="{{ $index }}">+</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-2 text-center">
                            <p class="mt-4">P {{ $order->total }}.00</p>
                        </div>
                        <div class="col-2 action-buttons">
                            <a href="{{ route('shipping.index', $order->id) }}" class="btn-action order-button">Order</a>
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-action delete-button " type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                    @php
                        $totalAmount += $order->total;
                    @endphp
                @endforeach
            </div>

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
                <div class="col-3 text-end"><strong>Total Price:</strong></div>
                <div class="col-2 text-center" id="totalPrice"><strong style="color: #FF2500">P
                        {{ number_format($totalAmount, 2) }}</strong></div>
                <div class="col-2"></div>
            </div>
        </div>
        <script>
            document.querySelectorAll('.quantity-change').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    var index = this.getAttribute('data-index');
                    var input = document.getElementById('quantity-' + index);
                    var currentValue = parseInt(input.value);
                    var type = this.getAttribute('data-type');

                    if (type === 'minus' && currentValue > 1) {
                        input.value = currentValue - 1;
                    } else if (type === 'plus') {
                        input.value = currentValue + 1;
                    }

                    // Submit the form for the specific item
                    document.getElementById('quantity-form-' + index).submit();
                });
            });
        </script>
    </div>
@endsection
