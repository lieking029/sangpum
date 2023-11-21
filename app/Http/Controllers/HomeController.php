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

    public function sellerIndex()
    {
        $products = Product::with('productVariations', 'shipping')->where('user_id', auth()->id())->where('published', 1)->paginate(12);

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
