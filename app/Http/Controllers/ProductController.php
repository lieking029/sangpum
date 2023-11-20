<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\PublishedProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('productVariations', 'shipping')->paginate(3);

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
        $product = Product::create($request->validated());
        $productVariation = [];

        foreach($request->variation as $variation)
        {
            $productVariation[] = [
                'variation_name' => $variation['variation_name'],
                'price' => $variation['price'],
                'stock' => $variation['stock'],
                'product_id' => $product->id,
            ];
        }

        $product->productVariations()->insert($productVariation);
        $product->shipping()->create($request->validated());

        return redirect()->route('products.create');
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
            $product = Product::find($publishedProduct->id);
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
