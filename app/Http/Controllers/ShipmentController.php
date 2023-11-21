<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function shipmentStatus() {
        $shipments = Shipment::with('product.user', 'productVariation', 'user')
        ->whereHas('product', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

        return view('seller.products.shipment', compact('shipments'));
    }

    public function myPurchase() {
        $shipments = Shipment::with('product.user', 'user', 'productVariation')->where('status', 0)->where('user_id', auth()->user()->id)->get();

        return view('buyer.myPurchase.index', compact('shipments'));
    }

    public function tracking(Shipment $shipment) {
        $shipment->load('product.user', 'productVariation', 'user', 'tracking');

        return view('buyer.myPurchase.tracking', compact('shipment'));
    }

    public function toShipment(Shipment $shipment)
    {
        $shipment->update(['status' => 2]);
    }

    public function toShipping(Shipment $shipment)
    {
        $shipment->update(['status' => 2]);
    }

    public function toReceive(Shipment $shipment)
    {
        $shipment->update(['status' => 3]);
    }

    public function complete(Shipment $shipment)
    {
        $shipment->update(['status'=> 4]);
    }

}
