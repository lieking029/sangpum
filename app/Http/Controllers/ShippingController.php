<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShipmentRequest;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\ShippingFee;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ShippingController extends Controller
{
    public function index($id)
    {
        $shipping = Order::with('product.shipping', 'productVariation')->find($id);
        $weight = $shipping->product->shipping->weight;
        $shipment = ShippingFee::first();
        if($weight == 1) {
            $shippingFee = $shipment->one_kilo;
        } elseif($weight == 2) {
            $shippingFee = $shipment->two_kilo;
        } elseif($weight == 3) {
            $shippingFee = $shipment->three_kilo;
        } elseif($weight == 4) {
            $shippingFee = $shipment->four_kilo;
        } elseif($weight == 5) {
            $shippingFee = $shipment->five_kilo;
        } elseif($weight == 6) {
            $shippingFee = $shipment->six_kilo;
        }

        return view('buyer.order.checkout.shipping', compact('shipping', 'shippingFee', 'weight'));
    }

    public function store(StoreShipmentRequest $request)
    {
        $orderId = Str::random(12);
        $shipments = Shipment::create($request->validated() + ['user_id' => auth()->id()]);
        $format = $orderId . $shipments->id;
        $shipments->update(['order_id' => $format]);

        $userWallet = auth()->user()->wallet;
        $balance = $userWallet - $request->total;
        auth()->user()->update(['wallet' => $balance]);


        $order = Order::find($request->order_id);
        $order->delete();

        return redirect()->route('shipping.myPurchase');
    }

}
