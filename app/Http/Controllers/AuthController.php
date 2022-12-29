<?php

namespace App\Http\Controllers;

use App\Events\UserLoggedIn;
use App\Http\Requests\SignInRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function signInForm()
    {
        return view('sign-in');
    }

    public function signIn(SignInRequest $request)
    {
        $credentials = $request->validated();

        $user = $this->userService->signIn($credentials, 'web', $request);
        if ($user) {
            session()->flash('success', 'Signed In');

            return redirect()->route('main');
        }

        session()->flash('error', 'The email address or password is incorrect. Please retry.');

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
