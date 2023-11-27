<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($id)
    {
        $orders = Order::with('product.productImages', 'productVariation')
            ->where('user_id', $id)
            ->paginate(10);

        return view('buyer.order.index', compact('orders'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $productPrice = ProductVariation::find($request->product_variation_id);
        $total = $productPrice->price * $request->quantity;
        $order->update(['total' => $total]);

        return redirect()->route('order.show', auth()->id());
    }

    public function changeQuantity(Request $request, $id)
    {
        $order = Order::with('productVariation')->find($id);
        if ($request->input('quantity') != '0') {
            $order->update(['quantity' => $request->input('quantity')]);
            $total = $order->productVariation->price * $order->quantity;
            $order->update(['total' => $total]);
        } else {
            $order->delete();
        }

        return redirect()->route('order.show', auth()->id());
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.show', auth()->id());
    }

    public function marketplace()
    {
        $products = Product::with('productVariations', 'shipping')
            ->where('published', 1)
            ->paginate(5);

        return view('marketplace.index', compact('products'));
    }

    public function allItems()
    {
        $products = Product::with('productVariations', 'shipping', 'productImages')
            ->where('published', 1)
            ->paginate(12);

        return view('marketplace.all-items', compact('products'));
    }

    public function productDetails(Product $product)
    {
        $product->load('shipping', 'productVariations', 'reviews');

        // Calculate the average rating
        $averageRating = $product->reviews()->avg('user_rating') ?? 0.0;

        // Calculate the total number of reviews
        $totalReviews = $product->reviews()->count();

        // Calculate the count for each star rating
        $starCounts = [];
        for ($star = 1; $star <= 5; $star++) {
            $starCounts[$star] = $product
                ->reviews()
                ->where('user_rating', $star)
                ->count();
        }

        return view('marketplace.productDetails', compact('product', 'averageRating', 'totalReviews', 'starCounts'));
    }

    public function addToCart(AddToCartRequest $request, Product $product)
    {
        $variation = ProductVariation::find($request->product_variation_id);
        $total = $variation->price * $request->quantity;

        Order::create($request->validated() + ['user_id' => auth()->id(), 'total' => $total]);

        return redirect()->route('order.show', auth()->id());
    }

    public function addReview(ReviewRequest $request)
    {
        ProductRating::create($request->validated() + ['user_id' => auth()->id()]);

        return redirect()->route('productDetails', $request->input('product_id'));
    }

    public function buyNow(AddToCartRequest $request)
    {
        $variation = ProductVariation::find($request->product_variation_id);
        $total = $variation->price * $request->quantity;

        $order = Order::create($request->validated() + ['user_id' => auth()->id(), 'total' => $total]);

        return redirect()->route('shipping.index', $order->id);
    }

}
