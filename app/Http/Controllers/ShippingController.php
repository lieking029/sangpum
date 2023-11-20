<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index($id)
    {
        $shipping = Order::find($id);

        return view('buyer.order.checkout.shipping', compact('shipping'));
    }
}
