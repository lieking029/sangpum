<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($id)
    {
        $orders = Order::with('product', 'productVariation')
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

        return redirect()->route('order.show');
    }

    public function marketplace()
    {
        $products = Product::with('productVariations', 'shipping')->paginate(5);

        return view('marketplace.index', compact('products'));
    }

    public function allItems()
    {
        $products = Product::with('productVariations', 'shipping')->paginate(12);

        return view('marketplace.all-items', compact('products'));
    }

    public function productDetails(Product $product)
    {
        $product->load('shipping', 'productVariations');

        return view('marketplace.productDetails', compact('product'));
    }

    public function addToCart(AddToCartRequest $request, Product $product)
    {
        $variation = ProductVariation::find($request->product_variation_id);
        $total = $variation->price * $request->quantity;

        Order::create($request->validated() + ['user_id' => auth()->id(), 'total' => $total]);

        return redirect()->route('order.show', auth()->id());
    }
}
