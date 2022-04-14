<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuseumRequest extends FormRequest
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
        if($this->isMethod('POST')) {
            return [
                'name' => ['required', 'string'],
                'background' => ['required', 'image', 'mimes:jpeg,png,jpg'],
                'address' => ['required', 'string'],
                'description' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'year_built' => ['required', 'string'],
                'price' => ['integer', 'required'],
                'coordinate' => ['required']
            ];
        }
        else {
            return [
                'name' => ['string'],
                'background' => [],
                'address' => ['required', 'string'],
                'description' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'year_built' => ['required', 'string'],
                'price' => ['integer', 'required'],
                'coordinate' => ['required']
            ];
        }
    }
}
