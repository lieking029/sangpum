@extends('layouts.app')

@section('content')

@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h4>Product</h4>
        </div>
        <div class="col text-end">
            <i class="fas fa-bars" style="font-size: 24px"></i>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <h4><strong>Add Product</strong></h4>
                    <h6>Basic Information</h6>
                    <div class="form-group mt-3">
                        <label for="product_image">Product Image</label>
                        <input type="file" name="product_image" class="form-control">
                    </div>
                    @error('product_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-3">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" placeholder="Product Name" class="form-control">
                    </div>
                    @error('product_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-3">
                        <label for="category">Category</label>
                        <input type="text" name="category" placeholder="Category" class="form-control">
                    </div>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-3">
                        <label for="product_description">Product Description</label>
                        <textarea name="product_description" id="" rows="2" class="form-control" placeholder="Product Description"></textarea>
                    </div>
                    @error('product_description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="form-group mt-3">
                        <label for="pre_order">Pre Order</label>
                        <input type="checkbox" name="pre_order" class="form-check">
                    </div>
                    @error('product_description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>
                <div class="col">
                    <div class="d-flex" style="float: right">
                        <button type="submit" class="btn rounded-5 px-5 me-3 text-white" style="background: #55aaad"><strong>Save</strong></button>
                        <a href="#" class="btn px-5 rounded-5 btn-secondary text-white"><strong>Cancel</strong></a>
                    </div> <br>
                    <h6><strong>Sales Info</strong></h6>
                    <div class="w-75">
                        <div class="row">
                            <div class="col text-center">
                                <span style="" class=""><strong>Variation</strong></span>
                            </div>
                            <div class="col text-center">
                                <span style="" class=""><strong>Price</strong></span>
                            </div>
                            <div class="col text-center">
                                <span style="" class=""><strong>Stock</strong></span>
                            </div>
                        </div>
                        <div class="" id="variations">
                        </div>
                        <button class="bg-transparent mt-2" type="button" id="addVariation" style="border: 2px solid #cacaca; font-size: 14px"><i class="fas fa-plus me-2" style="font-size: 10px"></i>Add Variation</button>
                    </div>

                    <div class="mt-4">
                        <h6><strong>Shipping</strong></h6>

                        <div class="" style="margin-left: 2%">
                            <div class="d-flex">
                                <label for="weight" style="margin-right: 10px">Weight:</label>
                                <input type="number" name="weight" style="height: 27px; width: 10rem; border: 2px solid #cacaca;"> kg
                            </div>

                            <div class="d-flex mt-3">
                                <label for="weight" style="margin-right: 10px">Parcel Size:</label>
                                <input type="number" name="height" style="height: 27px; width: 10rem; border: 2px solid #cacaca;"> <span style="margin-left: 10px; margin-right: 10px">X</span>
                                <input type="number" name="width" style="height: 27px; width: 10rem; border: 2px solid #cacaca;"> <span style="margin-left: 10px; margin-right: 10px">X</span>
                                <input type="number" name="length" style="height: 27px; width: 10rem; border: 2px solid #cacaca;">
                            </div>

                            <div class="form-group mt-3">
                                <label for="shipping_fee" style="margin-right: 10px">Shipping fee:</label>
                                <select name="shipping_fee" id="" class="form-select">
                                    <option value="standard local" selected>Standard Local</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $('#addVariation').on('click', function() {

            const variationLength = $('#variations .appended-variation').length
            console.log(variationLength);
            const variation = `
            <div class="row mt-2 appended-variation" style="margin-left: 10px">
                <div class="col text-center">
                    <input type="text" name="variation[${variationLength}][variation_name]" style="height: 27px; width: 10rem; border: 2px solid #cacaca;">
                </div>
                <div class="col">
                    <input type="number" name="variation[${variationLength}][price]" style="height: 27px; width: 10rem; border: 2px solid #cacaca;">
                </div>
                <div class="col">
                    <input type="number" name="variation[${variationLength}][stock]" style="height: 27px; width: 10rem; border: 2px solid #cacaca;">
                </div>
            </div>
            `
            $('#variations').prepend(variation);
        })
    </script>
</div>
@endsection
