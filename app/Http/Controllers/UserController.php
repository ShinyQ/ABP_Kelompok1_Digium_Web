<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function view_login(){
        if (session()->get('user')){
            return redirect('dashboard');
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

    public function detail(Request $request){
        $data = User::find($request->id);
        $title = 'Profile';
        $ret = array('title', 'data');
        return view('user.detail', compact($ret));
    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user = Auth::user();

            if($user->role != 'superuser'){
                return redirect()->back()->with('error', 'Email Atau Password Anda Salah');
            }

            request()->session()->put('user', Auth::user());
        } else {
            return redirect()->back()->with('error', 'Email Atau Password Anda Salah');
        }

        return redirect('dashboard');
    }

    public function log(Request $request){
        $data = Transaction::where('user_id',$request->id)->get();
        $title = 'User Transaction';
        // return $data[0]->name;
        return view('user.log', compact('title', 'data'));
    }

    public function logout(){
        request()->session()->forget('user');
        return redirect('user/login')->with('success', 'Sukses Melakukan Logout');
    }
}