<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($id)
    {
        $order = Order::where('user_id', $id)->get();

        return view('buyer.order.index');
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $productPrice = ProductVariation::find($request->product_variation_id);
        $total = $productPrice->price * $request->quantity;
        $order->update(['total' => $total]);

        return redirect()->route('order.index');
    }

    public function changeQuantity(Request $request, $id)
    {
        $order = Order::find($id);
        if($request->input('quantity') != 0) {
            $order->update(['quantity' => $request->input('quantity')]);
            $total = $order->price * $order->quantity;
            $order->update(['total'=> $total]);
        } else {
            $order->delete();
        }

        return redirect()->route('order.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index');
    }

}
