<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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

}
