<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
        if($this->isMethod('post')){
            $rules = [
                'user_id' => ['required', 'exists:users,id'],
                'museum_id' => ['required', 'exists:museum,id'],
                'total_price' => ['required'],
                'qty' => ['required']
            ];
        } else {
            $rules = [
                'user_id' => ['exists:users,id'],
                'museum_id' => ['exists:museum,id'],
                'total_price' => [],
                'qty' => []
            ];
        }

        return $rules;
    }
}