<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Tracking;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function shipmentStatus() {
        $shipments = Shipment::with('product.user', 'productVariation', 'user')
        ->whereHas('product', function ($query) {
            $query->where('user_id', auth()->id());
            // ->where('status', null);
        })->get();

        return view('seller.products.shipment', compact('shipments'));
    }

    public function completed() {
        $shipments = Shipment::with('product.user', 'productVariation', 'user')
        ->whereHas('product', function ($query) {
            $query->where('user_id', auth()->id())
                ->where('status', 3);
        })->get();

        return view('seller.products.completed', compact('shipments'));
    }

    public function myPurchase() {
        $shipments = Shipment::with('product.user', 'product.productImages', 'user', 'productVariation')
            ->where(function ($query) {
                $query->where('status', '!=', 3)
                    ->orWhereNull('status');
            })
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('buyer.myPurchase.index', compact('shipments'));
    }

    public function tracking(Shipment $shipment) {
        $shipment->load('product.user', 'productVariation', 'user', 'tracking');

        return view('buyer.myPurchase.tracking', compact('shipment'));
    }

    public function toShipment(Shipment $shipment)
    {
        $shipment->update(['status' => 0]);
        Tracking::create(['shipment_id' => $shipment->id, 'order_placed' => now()]);

        return redirect()->route('seller.shipment');
    }

    public function toShipping(Shipment $shipment)
    {
        $shipment->update(['status' => 1]);
        Tracking::where('shipment_id', $shipment->id)->update(['pre_ship' => now()]);

        return redirect()->route('seller.shipment');
    }

    public function toReceive(Shipment $shipment)
    {
        $shipment->update(['status' => 2]);
        Tracking::where('shipment_id', $shipment->id)->update(['delivery' => now()]);

        return redirect()->route('seller.shipment');
    }

    public function complete(Shipment $shipment)
    {
        $shipment->update(['status'=> 3]);
        Tracking::where('shipment_id', $shipment->id)->update(['complete' => now()]);

        return redirect()->route('seller.shipment');
    }

}
