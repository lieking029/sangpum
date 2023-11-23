@extends('layouts.app')

@section('content')

    <style>
        .highlighted {
            border: 2px solid #000000;
            /* Dark border */
        }
    </style>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <div class="container-fluid card">
        <div class="card-header row">
            <div class="col-2">
                <i class="fas fa-bars"></i>
                <a class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500" href="/post">Marketplace</a>
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
                <a class="btn" style="background:#4E6A80" href="/"><i class="fas fa-home"
                        style="color: white"></i></a>
            </div>
        </div>
        <form action="{{ route('addToCart', $product->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <img class="" src="{{ $product->product_image }}" alt="img" height="500" width=800">
                    </div>
                    <div class="col-4">
                        <h5 style="font-weight: 400">{{ $product->user->shop_name }}<i class="fas fa-check-circle mx-3"></i>
                        </h5>
                        <h2>{{ $product->product_name }}</h2>
                        <div>
                            <label for="">Price</label>
                            <div class="d-flex">
                                <h4>P :</h4>
                                <h4 id="price"></h4>
                            </div>
                        </div>
                        <div class="">
                            <label for="" style="color: red">*Pre order | 2023.07.04 ~ 2023.07.27 <br>
                                *release | 2023.07.28 18:00</label>
                        </div>
                        <div class="row mt-3">
                            <strong class="mb-4">Variation</strong>
                            @foreach ($product->productVariations as $variation)
                                <div class="col-4 text-center">
                                    <button class="variationId" type="button" data-id="{{ $variation->id }}"
                                        style="font-size: 11px; background: rgb(163, 163, 163); padding-top: 10px; padding-bottom: 10px; padding-right: 20px; padding-left: 20px; border-radius: 0; color: white;">{{ $variation->variation_name }}</button>
                                </div>
                            @endforeach
                            <input type="hidden" id="productVariation" name="product_variation_id">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span>Quantity</span> <br>
                                <input type="number" min="0" name="quantity" id="quantity" class="form-control"
                                    placeholder="0">
                            </div>
                            <div class="col">
                                <span>Total</span> <br>
                                <strong id="total"></strong>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="row d-flex justify-content-center align-items-center mt-5">
                            <button class="btn rounded-5 text-white" style="background: #55AAAD;" type="submit">
                                <strong>Add to Cart</strong>
                            </button>
                            <button class="btn btn-secondary rounded-5 text-white mt-3">
                                <strong>Buy Now</strong>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(() => {
                const baseUrl = '{{ url('') }}';
                $('.variationId').click(function() {
                    // Fetch variation details and update the price
                    fetch(baseUrl + '/variation-get/' + $(this).data('id'))
                        .then(response => response.json())
                        .then(variation => {
                            $('#productVariation').val(variation.id);
                            $('#price').text(variation.price.toFixed(
                                2)); // Assuming variation.price is a number
                        });
                });


                $('#quantity').on('input', function() {
                    const priceText = $('#price').text(); // Get the price as text
                    const price = parseFloat(priceText); // Convert the text to a floating point number
                    const quantity = parseInt($('#quantity').val(), 10);

                    // Make sure both price and quantity are valid numbers before calculating
                    if (!isNaN(price) && !isNaN(quantity)) {
                        const total = price * quantity;
                        $('#total').text('P ' + total.toFixed(2)); // Update the total text
                    }
                });
            })
        </script>
    </div>
@endsection
