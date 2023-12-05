<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
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
        $products = Product::with('productVariations', 'shipping', 'productImages')->where('user_id', auth()->id())->where('published', 1)->paginate(12);
        $shop = Shop::where('user_id', auth()->id())->first();

        return view('sellerHome',[
            'products' => $products,
            'shop' => $shop
        ]);
    }

    public function adminIndex()
    {
        $categories = Category::with('product')->get();
        $sellers = User::role(UserTypeEnum::Seller)->count();
        $users = User::role(UserTypeEnum::Buyer)->count();

        return view('adminHome', compact('sellers', 'users', 'categories'));
    }

}
