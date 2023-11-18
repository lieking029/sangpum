<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(Wallet $wallet)
    {
        return view("wallet.index", compact("wallet"));
    }



}
