@extends('layouts.app')

@section('content')
    <style>
        .border-end {
            border-right: 1px solid #000000;
            /* Change the color as needed */
        }

        .upload-box {
            border: 2px dashed #4C5370;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            background-color: #f8f9fa;
        }

        .upload-box:hover {
            background-color: #e2e6ea;
        }

        .upload-box p {
            margin: 0;
            font-size: 16px;
            color: #4C5370;
        }
    </style>
    @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif

    @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <div class="container-fluid card">
        <div class="card-header row">
            <div class="col">
                <h3 class="font-weight: 700">Product</h3>
            </div>
            <div class="col text-end mt-1">
                <div class="dropdown">
                    <button class="btn btn-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-bars" style="font-size: 23px"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3"
                                href="{{ route('seller.home') }}" style="background: #55AAAD; color:white; width: 85%">My
                                Shop</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3"
                                href="{{ route('products.index') }}"
                                style="background: #55AAAD; color:white; width: 85%">Product</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3"
                                href="{{ route('seller.shipment') }}"
                                style="background: #55AAAD; color:white; width: 85%">Shipment</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col border-end">
                        <h3><strong>Add Product</strong></h3>
                        <h6>Basic Information</h6>
                        <div class="from-group mb-3">
                            <label for="formFileMultiple" class="form-label">Product Images</label>
                            <div class="upload-box" onclick="document.getElementById('formFileMultiple').click();">
                                <p>Click to upload files</p>
                            </div>
                            <input class="form-control d-none" name="product_image[]" type="file" id="formFileMultiple"
                                multiple >
                        </div>
                        @error('product_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group mt-3">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" placeholder="Product Name" class="form-control" style="border: 2px solid #55aaad;">
                        </div>
                        @error('product_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group mt-3">
                            <label for="category">Category</label>
                            <select name="category_id" id="" class="form-select" style="border: 2px solid #55aaad;">
                                <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group mt-3">
                            <label for="product_description">Product Description</label>
                            <textarea name="product_description" id="" rows="2" class="form-control"
                                placeholder="Product Description" style="border: 2px solid #55aaad;"></textarea>
                        </div>
                        @error('product_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <div class="form-group mt-3">
                            <label for="pre_order">Pre Order</label>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="pre_order" class="form-check">
                                <label for="" class="m-3"><strong>No</strong></label>
                                <p style="font-size: 13px" class="mt-3">I will ship out within 2 business days. (excluding
                                    public
                                    holidays and courier service non-working days)</p>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" name="pre_order" class="form-check">
                                <label for="" class="m-3"><strong>Yes</strong></label>
                                <p class="mt-3" style="font-size: 13px">I need 7 business days to ship (between 7 to 30)
                                </p>
                            </div>
                        </div>
                        @error('product_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="col">
                        <div class="d-flex" style="float: right">
                            <button type="submit" class="btn rounded-5 px-5 me-3 text-white"
                                style="background: #55aaad"><strong>Save</strong></button>
                            <a href="#"
                                class="btn px-5 rounded-5 btn-secondary text-white"><strong>Cancel</strong></a>
                        </div> <br>
                        <h6 class="mt-4"><strong>Sales Information</strong></h6>
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
                            <button class="bg-transparent mt-2" type="button" id="addVariation"
                                style="border: 2px solid #55aaad; font-size: 14px"><i class="fas fa-plus me-2"
                                    style="font-size: 10px"></i>Add Variation</button>
                        </div>

                        <div class="mt-4">
                            <h6><strong>Shipping</strong></h6>
                            <div class="" style="margin-left: 2%">
                                <div class="d-flex align-items-center">
                                    <label for="weight" style="margin-right: 10px;">Weight:</label>
                                    <input type="number" max="6" name="weight" placeholder="|kg"
                                        style="height: 27px; width: 10rem; border: 2px solid #55aaad; text-align: right;">
                                </div>
                                <div class="d-flex mt-3">
                                    <label for="weight" style="margin-right: 10px">Parcel Size:</label>
                                    <input type="number" name="height" placeholder="|cm"
                                        style="height: 27px; width: 10rem; border: 2px solid #55aaad; text-align: right;">
                                    <span style="margin-left: 10px; margin-right: 10px">X</span>
                                    <input type="number" name="width" placeholder="|cm"
                                        style="height: 27px; width: 10rem; border: 2px solid #55aaad; text-align: right;">
                                    <span style="margin-left: 10px; margin-right: 10px">X</span>
                                    <input type="number" name="length" placeholder="|cm"
                                        style="height: 27px; width: 10rem; border: 2px solid #55aaad; text-align: right;">
                                </div>
                                <p style="font-size:13px">Please fill in dimensions accurately. Inaccurate or missing
                                    dimensions may result in
                                    additional shipping fee or failed delivery. If your item exceeds the maximum weight or
                                    parcel size limit, you may contact Customer Service to add XDE Logistics or other
                                    logistics provider as courier</p>

                                <div class="form-group mt-3">
                                    <label for="shipping_fee" style="margin-right: 10px">Shipping fee:</label>
                                    <select name="shipping_fee" id="" class="form-select" style="border: 2px solid #55aaad;">
                                        <option value="standard local" selected>Standard Local</option>
                                    </select>
                                </div>
                                <p style="font-size: 13px">
                                    Shipping settings will be applicable for this product only. Shipping fees displayed are
                                    base rates and will be subject to change depending on buyer and seller location. Economy
                                    Local base rates shown are only applicable to sellers in Metro Manila (and select Luzon
                                    cities) for shipments to VisMin, which will be 30% cheaper than Standard Local. Kindly
                                    contact your Relationship Manager to know more about Economy Local and how to activate
                                    it.
                                </p>
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
                    <input type="text" name="variation[${variationLength}][variation_name]" style="height: 27px; width: 10rem; border: 2px solid #55aaad;">
                </div>
                <div class="col">
                    <input type="number" name="variation[${variationLength}][price]" style="height: 27px; width: 10rem; border: 2px solid #55aaad;">
                </div>
                <div class="col">
                    <input type="number" name="variation[${variationLength}][stock]" style="height: 27px; width: 10rem; border: 2px solid #55aaad;">
                </div>
            </div>
            `
                $('#variations').prepend(variation);
            })

            document.getElementById('formFileMultiple').onchange = function() {
                // You can add code here to handle the files selected by the user
                // For example, update the text of the upload box to show the number of files selected
                const fileInput = document.getElementById('formFileMultiple');
                const fileCount = fileInput.files.length;
                const textBox = document.querySelector('.upload-box p');

                if (fileCount > 0) {
                    textBox.textContent = fileCount + " files selected";
                } else {
                    textBox.textContent = "Click to upload files";
                }
            };
        </script>
    </div>
@endsection
