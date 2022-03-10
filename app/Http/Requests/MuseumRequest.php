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
        if($this->isMethod('post')){
            $rules = [
                'name' => ['required', 'string'],
                'background' => ['required', 'string'],
                'panorama' => ['required', 'string'],
                'description' => ['required', 'text'],
                'location' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'coordinate' => ['required', 'point']
            ];
        } else {
            $rules = [
                'name' => ['string'],
                'background' => ['string'],
                'panorama' => ['string'],
                'description' => ['text'],
                'location' => ['string'],
                'phone' => ['string'],
                'coordinate' => ['point']
            ];
        }

        return $rules;
    }
}