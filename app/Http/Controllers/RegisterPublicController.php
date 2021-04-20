<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\Models\Address;
use App\Models\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterPublicController extends Controller
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'company' => 'nullable|string',
            'country' => 'required|string',
            'city' => 'nullable|string',
            'code_postal' => 'nullable|numeric',
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Address::create([
            'user_id' =>      $user->id,
            'first_name' =>   $data['first_name'],
            'last_name' =>    $data['last_name'],
            'email' =>        $user->email,
            'phone' =>        $data['phone'],
            'company' =>      $data['company'] ?? '',
            'country' =>      $data['country'],
            'city' =>         $data['city'] ?? '',
            'code_postal' =>  $data['code_postal'] ?? '',
            'address_1' =>    $data['address_1'],
            'address_2' =>    $data['address_2'] ?? '',
        ]);

        Profile::create([
            'user_id' => $user->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'identity' => $data['identity'],
            'avatar' => 'avatar-default.jpg',
        ]);

        $user->roles()->attach(Role::where('name', 'user')->first());

        return $user;
    }
}
