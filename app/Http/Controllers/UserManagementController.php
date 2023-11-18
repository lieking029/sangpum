<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function showSeller(User $user)
    {
        $user->load('shop');

        return view("admin.users.showSeller", compact("user"));
    }

    public function showBuyer(User $user)
    {
        return view('admin.users.showBuyer', compact('user'));
    }



}
