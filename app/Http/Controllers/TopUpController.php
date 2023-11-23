<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Http\Requests\StoreTopUpRequest;
use App\Http\Requests\TransferPointRequest;
use App\Models\TopUp;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
        $reference = Str::random(12);
        $topUp = TopUp::create($request->except('proof') + ['proof' => $request->file('proof')->store('topUps', 'public'), 'user_id' => auth()->id()]);
        $topUp->update(['reference_number' => $reference . $topUp->id]);

        return redirect()->route('top-up.create');
    }

    public function transferPoint(User $user, TransferPointRequest $request)
    {
        $admin = User::role(UserTypeEnum::Admin)->first();
        $wallet = $user->wallet += (float) $request->topup_request;
        $user->update(['wallet' => $wallet]);

        $adminWallet = $admin->wallet += (float) $request->topup_request;
        $admin->update(['wallet' => $adminWallet]);

        TransactionHistory::create($request->validated() + ['user_id' => $user->id]);

        $topUp = TopUp::find($request->top_up_id);
        $topUp->delete();

        return redirect()->route('top-up.index');
    }

    public function show(User $user)
    {
        $user->load('topUp');

        return view('buyer.topup.show', compact('user'));
    }

}
