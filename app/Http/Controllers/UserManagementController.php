<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function showSeller()
    {
        $sellers = User::role(UserTypeEnum::Seller)->paginate(10);

        return view("admin.sellers", compact("sellers"));
    }

    public function showBuyer()
    {
        $buyers = User::role(UserTypeEnum::Buyer)->paginate(10);

        return view('admin.buyers', compact('buyers'));
    }

    public function verify(User $user)
    {
        $user->update(['verified' => auth()->id()]);

        return redirect()->back();
    }

}
