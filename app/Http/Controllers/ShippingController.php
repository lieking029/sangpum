<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShippingFee;
use Illuminate\Http\Request;

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
}
