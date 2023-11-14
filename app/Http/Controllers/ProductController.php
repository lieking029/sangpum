<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {

        return view("seller.products.create");
    }

    public function store()
    {
        return redirect()->route('products.create');
    }

}
