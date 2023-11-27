<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function edit(Shop $shop)
    {
        $shop->load('user');

        return view('seller.shop.edit', compact('shop'));
    }

    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $shop->update($request->validated());

        return redirect()->route('seller.home');
    }

}
