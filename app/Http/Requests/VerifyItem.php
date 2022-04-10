<?php

namespace App\Http\Requests;

use App\Rules\QrCode;
use Illuminate\Foundation\Http\FormRequest;

class VerifyItem extends FormRequest
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
        return [
            'code' => ['required', new QrCode()]
        ];
    }
}
