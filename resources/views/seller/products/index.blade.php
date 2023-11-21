@extends('layouts.app')

@section('content')
    <style>
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
            <div class="col">
                <h4 style="font-weight: 800">Product</h4>
            </div>
            <div class="col text-end">
                <i class="fas fa-bars" style="font-size: 24px"></i>
            </div>
        </div>
        <div class="card-body">
            <div class="card-header row">
                <div class="col">
                    <h5>{{ $products->count() }}Products</h5>
                </div>
                <div class="col text-end">
                    <a href="{{ route('products.create') }}" class="btn text-white" style="background: #FF2500; font-size: 12px"><i class="fas fa-plus"></i>Add Product</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('product.published') }}" method="POST">
                @csrf
                <div class="container table-responsive">
                    @foreach ($products as $product)
                        <div class="row">
                            <div class="col">
                                <div class="form-check d-flex">
                                    <input class="form-check-input" type="checkbox" value="{{ $product->id }}" id="flexCheckDefault"
                                        style="margin-top: 45px; margin-right:20px;"
                                        name="published[{{ $loop->index }}][id]"
                                        @if($product->published == 1) checked disabled @endif>

                                    <img src="" alt="" width="100" height="100" class="mb-3">
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-center" style="margin-top: 40px;">
                                    <label for="">{{ $product->product_name }}</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column align-items-center">
                                    <a href="#" class="btn"
                                        style="font-size: 12px; background: #D4D6D8; padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0;  color: black">
                                        Variation</a>
                                    @foreach ($product->productVariations as $variation)
                                        <label for="" style="font-size: 11px" >{{ $variation->variation_name }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column align-items-center">
                                    <a href="#" class="btn"
                                        style="font-size: 12px; background: #D4D6D8; padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0;   color: black">
                                        Price</a>
                                    @foreach ($product->productVariations as $variation)
                                        <label for="" style="font-size: 11px">{{ $variation->price }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column align-items-center">
                                    <a href="#" class="btn"
                                        style="font-size: 12px; background: #D4D6D8; padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; color: black">
                                        Stock</a>
                                    @foreach ($product->productVariations as $variation)
                                        <label for="" style="font-size: 11px">{{ $variation->stock }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column align-items-center">
                                    <a href="#" class="btn"
                                        style="font-size: 12px; background: #D4D6D8; padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0;  color: black">
                                        Sales</a>
                                    @foreach ($product->productVariations as $variation)
                                        <label for="" style="font-size: 11px">{{ $variation->sales }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="#" class="btn m-2"
                                        style="font-size: 12px; background: #D4D6D8; padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0;  color: black">
                                        Edit</a>
                                    <a href="#" class="btn m-2"
                                        style="font-size: 12px; background: #D4D6D8; padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; color: black">
                                        Delete</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        {{ $products->links() }}
                    </div>
                </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <div class="">
                {{-- <a href="#" class="btn m-2"
                    style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 5px; padding-bottom: 5px; padding-right: 20px; padding-left: 20px; border-radius: 0; color: white">
                    Select All</a> --}}
            </div>
            <div class="">
                <a href="#" class="btn m-2"
                    style="font-size: 9px; background: #FF2500; padding-top: 5px; padding-bottom: 5px; padding-right: 20px; padding-left: 20px; border-radius: 0; color: white">
                    Delete</a>
                <button type="submit" class="btn m-2"
                    style="font-size: 9px; background: #55AAAD; padding-top: 5px; padding-bottom: 5px; padding-right: 20px; padding-left: 20px; border-radius: 0; color: white">
                    Publish</button>
            </div>
        </div>
        </form>
    </div>
@endsection
