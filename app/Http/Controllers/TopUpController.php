<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Http\Requests\StoreTopUpRequest;
use App\Http\Requests\TransferPointRequest;
use App\Models\TopUp;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;

class TopUpController extends Controller
{

    public function index()
    {
        $topUps = TopUp::with('user')->get();

        return view('admin.topup', compact('topUps'));
    }

    public function create()
    {
        return view('buyer.topup.index');
    }

    public function store(StoreTopUpRequest $request)
    {
        TopUp::create($request->except('proof') + ['proof' => $request->file('proof')->store('topUps', 'public'), 'user_id' => auth()->id()]);

        return redirect()->route('top-up.create');
    }

    public function transferPoint(User $user, TransferPointRequest $request)
    {
        $admin = User::role(UserTypeEnum::Admin)->first();
        $user->wallet += (float) $request->topup_request;
        $user->save();

        $admin->wallet += (float) $request->topup_request;
        $admin->save();

        TransactionHistory::create($request->validated() + ['user_id' => $user->id]);

        return redirect()->route('top-up.show', auth()->id());
    }

    public function show(User $user)
    {
        $user->load('topUp');

        return view('buyer.topup.show', compact('user'));
    }

}
