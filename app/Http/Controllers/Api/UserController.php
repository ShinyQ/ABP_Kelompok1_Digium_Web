<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Api;

class UserController extends Controller
{
    private $code, $response;

    public function __construct()
    {
        $this->code = 200;
        $this->response = [];
    }

    public function generate_user($user)
    {
        $success['user'] = $user;
        $success['token'] = $user->createToken('digimu_abp')->accessToken;

        return $success;
    }

    public function login(UserRequest $request)
    {
        if ($request->remember_token) {
            $data = User::where('email', $request->email)->where('remember_token', $request->remember_token)->first();

            if (is_null($data)) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'photo' => $request->avatar,
                    'remember_token' => $request->remember_token,
                    'email_verified_at' => Carbon::now(),
                ]);
            } else if (Auth::loginUsingId($data->id)) {
                $user = Auth::user();
            }

            $this->response = $this->generate_user($user);
        } else if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $this->response = $this->generate_user($user);
        } else {
            $this->code = 401;
        }

        return Api::apiRespond($this->code, $this->response);
    }

    public function register(UserRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Bcrypt($request->password);

            $this->response = User::create($data);
        } catch (Exception $e) {
            $this->code = 500;
            $this->response = $e->getMessage();
        }

        return Api::apiRespond($this->code, $this->response);
    }

    public function profile()
    {
        try {
            $this->response = auth()->guard('api')->user();
        } catch (Exception $e) {
            $this->code = 500;
            $this->response = $e->getMessage();
        }

        return Api::apiRespond($this->code, $this->response);
    }

    public function logout()
    {
        try {
            $user = auth()->guard('api')->user();

            if ($user) {
                foreach ($user->tokens as $token) {
                    $token->revoke();
                }
            }

            Auth::logout();
        } catch (Exception $e) {
            $this->code = 500;
            $this->response = $e->getMessage();
        }

        return Api::apiRespond($this->code, $this->response);
    }

    public function send_verification()
    {
        try {
            $auth = User::where('id', auth()->guard('api')->user()->id)->first();
            $code = \Str::random(20);
            $name = $auth->name;

            $auth->update(['email_code' => $code]);
            $data = ['code' => $code, 'name' => $name];

            Mail::to($auth->email)->send(new EmailVerification($data));
        } catch (Exception $e) {
            $this->code = 500;
            $this->response = $e->getMessage();
        }

        return Api::apiRespond($this->code, $this->response);
    }
}
