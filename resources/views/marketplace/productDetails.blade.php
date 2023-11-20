@extends('layouts.app')

@section('content')

    <style>
        .highlighted {
            background-color: #cecece;
            /* or any highlight color you prefer */
            color: white;
            /* change text color if needed */
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
                <span class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500">Marketplace</span>
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
                <span class="btn" style="background:#4E6A80"><i class="fas fa-home" style="color: white"></i></span>
            </div>
        </div>
        <form action="{{ route('addToCart', $product->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <img class=""
                            src="https://scontent.fmnl9-4.fna.fbcdn.net/v/t39.30808-6/355459684_995658415192585_5242516178701158225_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeG7uCcEq9_G6hvBmwZDugTI5f3TgIY7Z6fl_dOAhjtnp027VQ4J47mjO2sx0b-GgdJbZWvTx-Nu9mBm7e85-cJW&_nc_ohc=cVbvfYYhG1gAX9P7-br&_nc_ht=scontent.fmnl9-4.fna&oh=00_AfB6MbqwxJxXHW_y2ycXBl3mkeAjW_mfXmL3OW3G9ewCXw&oe=655F6368"
                            alt="img" height="500" width=800">
                    </div>
                    <div class="col-4">
                        <h5 style="font-weight: 400">TEUCART <i class="fas fa-check-circle mx-3"></i></h5>
                        <h2>{{ $product->product_name }}</h2>
                        <div>
                            <label for="">Price</label>
                            <h4 id="price"></h4>
                        </div>
                        <div class="">
                            <label for="" style="color: red">*Pre order | 2023.07.04 ~ 2023.07.27 <br>
                                *release | 2023.07.28 18:00</label>
                        </div>
                        <div class="row">
                            <strong>Variation</strong>
                            @foreach ($product->productVariations as $variation)
                            <div class="col-4 text-center">
                                <button class="variationId" type="button" data-id="{{ $variation->id }}"
                                        style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 5px; padding-bottom: 5px; padding-right: 20px; padding-left: 20px; border-radius: 0; color: white; border: none;">{{ $variation->variation_name }}</button>
                            </div>
                            @endforeach
                            <input type="hidden" id="productVariation" name="product_variation_id">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>
                        <div class="row">
                            <div class="col">
                                <span>Quantity</span> <br>
                                <input type="number" min="0" name="quantity" id="quantity" class="form-control"
                                    placeholder="0">
                            </div>
                            <div class="col">
                                <span>Total</span> <br>
                                P <strong id="total"></strong>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="row mt-4">
                            <button class="btn col rounded-5 text-white" style="background: #55AAAD;"
                                type="submit"><strong>Add to Cart</strong></button>
                            <button class="btn btn-secondary col rounded-5 text-white"><strong>Buy Now</strong></button>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(() => {
                const baseUrl = '{{ url('') }}';
                $('.variationId').click(function() {
                    $('.variationId').removeClass('highlighted');
                    // Highlight the clicked button
                    $(this).addClass('highlighted');
                    fetch(baseUrl + '/variation-get/' + $(this).data('id'))
                        .then(response => response.json())
                        .then(variation => {
                            $('#productVariation').val(variation.id)
                            $('#price').text('P ' + variation.price)

                        })
                })

                $('#quantity').on('input', function() {
                    const price = parseFloat($('#price').val());
                    const quantity = parseInt($('#quantity').val(), 10);

                    const total = price * quantity;
                    $('#total').text(total.toFixed(
                        2)); // toFixed(2) to format it as a currency with two decimal places
                });
            })
        </script>
    </div>
@endsection
