<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
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
