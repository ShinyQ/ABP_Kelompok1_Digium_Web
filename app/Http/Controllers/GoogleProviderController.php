<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class GoogleProviderController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback(): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('google')->user();
        $auth_user = $this->findUser($user);

        if($auth_user){
            Auth::loginUsingId($auth_user->id);
            request()->session()->put('user', Auth::user());

            return redirect('/dashboard');
        }

        return redirect('/user/login')->with('error', 'Login tidak dapat dilakukan');
    }

    public function findUser($providerUser)
    {
        $user = null;
        $check_role = User::where('email', $providerUser->getEmail())->first();

        if($check_role->role == 'superuser'){
            $user = $check_role;
            $user->update(['photo' => $providerUser->avatar]);
        }

        return $user;
    }
}
