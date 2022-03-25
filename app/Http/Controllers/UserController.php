<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function view_login(){
        if (session()->get('user')){
            return redirect()->back();
        }

        return view('login');
    }

    public function index(){
        $title = "Daftar Pengguna";
        $users = User::latest()->paginate();

        return view('user.index', compact('users', 'title'));
    }
    public function profile(){
        $title = "Profile";
        $user = User::findOrFail(request()->session()->get('user')->id);

        return view('user.profile', compact('user', 'title'));
    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            request()->session()->put('user', Auth::user());
        }

        return redirect('dashboard');
    }

    public function logout(){
        request()->session()->forget('user');
        return redirect('user/login')->with('success', 'Sukses Melakukan Logout');
    }
}
