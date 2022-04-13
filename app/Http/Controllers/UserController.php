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
        $id = request()->session()->get('user')->id;

        $user = User::findOrFail($id);
        $data = Transaction::where('user_id', $id)->get();
        $title = 'Profile User';

        return view('user.detail', compact('title', 'user', 'data'));
    }

    public function detail($id){
        $data = Transaction::where('user_id', $id)->get();
        $user = User::find($id);
        $title = 'User Detail';

        return view('user.detail', compact('title', 'user', 'data'));
    }

    public function update_role($id, $role){
        User::where('id', $id)->update(['role' => $role]);
        return redirect()->back()->with('success', 'Sukses update role pengguna');
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

    public function user_transaction($id){
        $data = Transaction::where('user_id', $id)->get();
        $title = 'User Transaction';

        return view('user.log', compact('title', 'data'));
    }

    public function logout(){
        request()->session()->forget('user');
        return redirect('user/login')->with('success', 'Sukses Melakukan Logout');
    }
}
