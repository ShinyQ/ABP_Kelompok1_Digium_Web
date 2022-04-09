<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Api;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(Route::current()->uri == 'api/user/register'){
            $rules = [
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required']
            ];
        } else  {
            $rules = [
                'email' => ['required', 'email'],
            ];
        }

        return $rules;
    }

    /**
     * @param Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, Api::apiRespond(400, $validator->errors()->all()));
    }
}
