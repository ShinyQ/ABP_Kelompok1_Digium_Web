<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Api;

class UserController extends Controller
{
    private $code, $response;

    public function __construct(){
        $this->code = 200;
        $this->response = [];
    }

    public function register(UserRequest $request){
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

    public function login(UserRequest $request){
        try {
            $request = $request->validated();

            if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
                $user = Auth::user();

                $response['user'] = $user;
                $response['token'] = $user->createToken('digiumdipl')->accessToken;
            } else {
                $this->code = 401;
                $response = ["Email Atau Password Anda Salah"];
            }

            $this->response = $response;
        } catch (Exception $e) {
            $this->code = 500;
            $this->response = $e->getMessage();
        }

        return Api::apiRespond($this->code, $this->response);
    }

    public function profile(){
        try {
            $this->response = auth()->guard('api')->user();
        } catch (Exception $e) {
            $this->code = 500;
            $this->response = $e->getMessage();
        }

        return Api::apiRespond($this->code, $this->response);
    }

    public function logout(){
        try {
            $user = auth()->guard('api')->user();

            if($user){
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
}
