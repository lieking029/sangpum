<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'nickname' => ['required', 'string', 'max:255'],
            'astr_sign' => ['required', 'string', 'max:255'],
            'kpop_group' => ['required', 'string', 'max:255'],
            'bias' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'govt_type' => ['required', 'string', 'max:255'],
            'govt_id' => ['nullable', File::image()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // SHOP
            'shop_name'=> ['nullable', 'max:255'],
            'shop_address'=> ['nullable', 'max:255'],
            'shop_barangay'=> ['nullable', 'max:255'],
            'date_established'=> ['nullable', 'date'],
            'contact_number'=> ['nullable', 'max:255'],
            'dti_number'=> ['nullable', 'max:255'],
            'dti_permit'=> ['nullable', File::image()],
            'barangay_clearance'=> ['nullable', File::image()],
            'business_permit'=> ['nullable', File::image()],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role = Role::where('name', $data['role'])->firstOrFail();

         // Check if there is a file in the data and it is valid
        if (isset($data['govt_id']) && $data['govt_id']->isValid()) {
            // Store the file and get the path
            $filePath = $data['govt_id']->store('public/auth');

            // Store just the filename if you prefer
            // $filename = $data['govt_id']->hashName();

            // Replace the file in the array with the path or filename
            $data['govt_id'] = $filePath;
        } else {
            // If there is no file or the file is not valid, set the govt_id to null
            $data['govt_id'] = null;
        }

        if($role == 'buyer')
        {
            $user = User::create([
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'birth_date' => $data['birth_date'],
                'nickname' => $data['nickname'],
                'astr_sign' => $data['astr_sign'],
                'kpop_group' => $data['kpop_group'],
                'bias' => $data['bias'],
                'address' => $data['address'],
                'barangay' => $data['barangay'],
                'govt_type' => $data['govt_type'],
                'govt_id' => $data['govt_id'],
                'wallet' => 0.00,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        } else {
            $user = User::create([
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'birth_date' => $data['birth_date'],
                'nickname' => $data['nickname'],
                'astr_sign' => $data['astr_sign'],
                'kpop_group' => $data['kpop_group'],
                'bias' => $data['bias'],
                'address' => $data['address'],
                'barangay' => $data['barangay'],
                'govt_type' => $data['govt_type'],
                'govt_id' => $data['govt_id'],
                'wallet' => 0.00,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            Shop::create([
                'user_id'=> $user->id,
                'shop_name' => $data['shop_name'],
                'shop_address' => $data['shop_address'],
                'shop_barangay' => $data['shop_barangay'],
                'date_established' => $data['date_established'],
                'contact_number' => $data['contact_number'],
                'dti_number' => $data['dti_number'],
                'dti_permit' => $data['dti_permit'],
                'barangay_clearance' => $data['barangay_clearance'],
                'business_permit' => $data['business_permit'],
            ]);
        }

        $user->assignRole($role);

        return $user;
    }
}
