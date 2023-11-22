<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\PublishedProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('productVariations', 'shipping', 'productImages')->where('user_id', auth()->id())->get();

        return view("seller.products.index", [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view("seller.products.create");
    }

    public function store(StoreProductRequest $request)
{
    $productData = $request->validated();
    unset($productData['product_image']); // Remove the image data from the array
    $product = Product::create($productData + ['user_id' => auth()->id()]);

    $productVariation = [];

    foreach ($request->variation as $variation) {
        $productVariation[] = [
            'variation_name' => $variation['variation_name'],
            'price' => $variation['price'],
            'stock' => $variation['stock'],
            'product_id' => $product->id,
        ];
    }

    $product->productVariations()->insert($productVariation);
    $product->shipping()->create($request->validated());


    if ($request->hasFile('product_image')) {
        foreach ($request->file('product_image') as $image) {
            // Store the image in the public disk (storage/app/public)
            $path = $image->store('products', 'public');

            // Insert each image path with the corresponding product_id into the product_images table
            ProductImage::create([
                'product_id' => $product->id,
                // Change the path from 'public/products' to 'storage/products'
                'image_path' => str_replace('public/', 'storage/', $path)
            ]);
        }
    }

    return redirect()->route('products.index');
}

    public function edit(Product $product)
    {
        $product->load('productVariations', 'shipping');

        return view('products.edit');
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        $productVariation = [];

        foreach($request->variation as $variation) {
            if($variationProduct = ProductVariation::find($variation->variation_id))
            {
                $variationProduct->update([
                    'variation_name' => $variation['variation_name'],
                    'price' => $variation['price'],
                    'stock' => $variation['stock']
                ]);
            } else {
                ProductVariation::create([
                    'variation_name' => $variation['variation_name'],
                    'price' => $variation['price'],
                    'stock' => $variation['stock'],
                    'product_id' => $product->id
                ]);
            }

            $product->shipping()->update($request->validated());
        }

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }

    public function published(PublishedProductRequest $request)
    {

        foreach($request->published as $publishedProduct)
        {
            $product = Product::find($publishedProduct['id']);
            $product->update(['published' => 1]);
        }

        return redirect()->route('products.index');
    }

    public function bulkDelete(PublishedProductRequest $request)
    {
        foreach($request->published as $publishedProduct)
        {
            $product = Product::find($publishedProduct->id);
            $product->delete();
        }

        return redirect()->route('products.index');
    }
}
