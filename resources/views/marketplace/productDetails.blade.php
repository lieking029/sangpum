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
                {{-- <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div> --}}
            </div>
            <div class="col-2 text-end">
                <a class="btn" style="background:#4E6A80" href="{{ url('/') }}"><i class="fas fa-home"
                        style="color: white"></i></a>
            </div>
        </div>
        <form action="" method="POST" id="order-form">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <img class="" src="{{ asset('storage/' . $product->productImages->first()->image_path) }}"
                            alt="img" height="500" width="800">
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
                                        style="font-size: 11px; background: rgb(163, 163, 163); padding-top: 10px; padding-bottom: 10px; padding-right: 20px; padding-left: 20px; border-radius: 0; color: white; border: none">{{ $variation->variation_name }}</button>
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
                            <button class="btn rounded-5 text-white" style="background: #55AAAD;" type="button"
                                onclick="setFormAction('addToCart', event)">
                                <strong>Add to Cart</strong>
                            </button>
                            <button class="btn btn-secondary rounded-5 text-white mt-3" type="button"
                                onclick="setFormAction('buyNow', event)">
                                <strong>Buy Now</strong>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container card mt-5">
        <div class="card-header">
            <h3>Products Reviews</h3>
        </div>
        <form action="{{ route('products.review') }}" method="POST" id="review_form">
            @csrf
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <h1 class="text-warning mt-4 mb-4">
                                    <b><span id="average_rating">{{ number_format($averageRating, 1) }}</span> / 5</b>
                                </h1>
                                <h3><span id="total_review">{{ $totalReviews }}</span> Reviews</h3>
                            </div>
                            <div class="col-sm-4">
                                <p>
                                    @for ($star = 5; $star >= 1; $star--)
                                        <div class="progress-label-left"><b>{{ $star }}</b> <i
                                                class="fas fa-star text-warning"></i></div>
                                        <div class="progress-label-right">({{ $starCounts[$star] }})</div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                aria-valuenow="{{ $starCounts[$star] }}" aria-valuemin="0"
                                                aria-valuemax="{{ $totalReviews }}"
                                                style="width: {{ $totalReviews ? ($starCounts[$star] / $totalReviews) * 100 : 0 }}%;">
                                            </div>
                                        </div>
                                    @endfor
                                </p>
                            </div>
                            <div class="col-sm-4 text-center">
                                <h3 class="mt-4 mb-3">Write Review Here</h3>
                                <h4 class="text-center mt-2 mb-4">
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"
                                        required></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2"
                                        data-rating="2"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3"
                                        data-rating="3"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4"
                                        data-rating="4"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5"
                                        data-rating="5"></i>
                                </h4>
                                <input type="hidden" name="product_id" value="{{ $product->id }}" id="product_id">
                                <input type="hidden" name="user_rating" id="rating" value="">
                                @error('user_rating')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <textarea name="user_comment" id="user_comment" class="form-control"></textarea>
                                </div>
                                <button type="submit" name="add_review" class="btn btn-primary mt-3">Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @forelse ($product->reviews as $review)
                    <div class="review-block border p-3">
                        <p>{{ $review->user_comment }}</p>
                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->user_rating)
                                    <i class="fas fa-star text-warning"></i> {{-- Filled star --}}
                                @else
                                    <i class="far fa-star"></i> {{-- Empty star (use `far fa-star` for regular star) --}}
                                @endif
                            @endfor
                        </div>
                        <small>Reviewed by: {{ $review->user->first_name ?? 'Anonymous' }}</small>
                    </div>
                @empty
                    <p>No reviews yet.</p>
                @endforelse
            </div>
        </form>
    </div>

    <script>
        window.setFormAction = function(action, event) {
            event.preventDefault(); // Prevent the default form submit action
            var form = document.querySelector('#order-form');
            if (action == 'addToCart') {
                form.action = "{{ route('addToCart', $product->id) }}";
            } else if (action == 'buyNow') {
                form.action = "{{ route('buyNow') }}";
            }
            console.log(form.action); // To check the form action URL
            form.submit();
        };

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

            var rating_data = 0;

            $(document).on('click', '.submit_star', function() {
                rating_data = $(this).data('rating');
                $('#rating').val(rating_data);

                $('.submit_star').removeClass('text-warning').addClass('star-light');
                for (var count = 1; count <= rating_data; count++) {
                    $('#submit_star_' + count).removeClass('star-light').addClass('text-warning');
                }
            });

            $(document).on('mouseleave', '.submit_star', function() {
                $('.submit_star').removeClass('text-warning').addClass('star-light');
                for (var count = 1; count <= rating_data; count++) {
                    $('#submit_star_' + count).removeClass('star-light').addClass('text-warning');
                }
            });

            $('#review_form').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                if (rating_data === 0) {
                    alert('Please select a star rating.');
                    return; // Stop the function if no rating is selected
                }

                var formData = {
                    'user_rating': rating_data,
                    'user_comment': $('#user_comment').val(),
                    'product_id': $('#product_id').val(),
                    '_token': $('input[name="_token"]').val()
                };

                console.log(formData);

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
