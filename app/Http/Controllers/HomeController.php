<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sellerIndex()
    {
        $products = Product::all();

        return view('sellerHome',[
            'products' => $products
        ]);
    }

    public function adminIndex()
    {
        $sellers = User::role(UserTypeEnum::Seller)->count();
        $users = User::role(UserTypeEnum::Buyer)->count();

        return view('adminHome', compact('sellers', 'users'));
    }

}
