<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopUpRequest;
use App\Models\TopUp;
use Illuminate\Http\Request;

class TopUpController extends Controller
{

    public function index()
    {
        return view('buyer.topUp.index');
    }

    public function store(StoreTopUpRequest $request)
    {
        TopUp::create($request->except(['proof' => $request->file('proof')->store('topUps', 'public')]));

        return redirect()->route('topUp.index');
    }

}
