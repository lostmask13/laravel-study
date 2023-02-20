<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:1'],
            'email' => ['required', 'string', 'email:rfc', 'max:40', 'unique:users'],
            'password' => ['required', 'string', 'min:7', 'max:40', 'confirmed'],
            'checkbox' => ['required', 'accepted'],
        ]);
    }

    /**
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'checkbox' => ['required', 'accepted'],
        ]);
    }

    /**
     */
    protected function registered(Request $request, $user)
    {
        return redirect()->route('user.index')
            ->with('success', 'Registration completed successfully');
    }
}
