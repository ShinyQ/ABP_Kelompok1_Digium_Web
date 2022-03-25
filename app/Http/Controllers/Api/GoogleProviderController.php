<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Api;

class GoogleProviderController extends Controller
{
    public function redirectToGoogle(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback(): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('google')->user();

        if (empty($user->email)) {
            return Redirect::to(env('BASE_URL') . '/user/login');
        }

        $auth_user = $this->findOrCreateUser($user);

        if($auth_user){
            Auth::loginUsingId($auth_user->id);
            request()->session()->put('user', Auth::user());

            return redirect('/')->with('success', 'Sukses Melakukan Login');
        }

        return redirect('/user/login')->with('error', 'Login Harus Menggunakan SSO Telkom University');
    }

    public function findOrCreateUser($providerUser)
    {
        $user = User::where('email', $providerUser->getEmail())->first();

        if(!$user) {
            $user = User::create([
                'name' => $providerUser->name,
                'email' => $providerUser->email,
                'photo' => $providerUser->avatar,
                'email_verified_at' => Carbon::now(),
            ]);
        } else {
            $user->update(['photo' => $providerUser->avatar]);
        }

        return $user;
    }
}
