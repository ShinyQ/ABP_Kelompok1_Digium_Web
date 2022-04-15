<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            $rules = [
                'museum_id' => ['required', 'exists:museums,id'],
                'photo' => ['required', 'image', 'mimes:jpeg,png,jpg']
            ];
        } else {
            $rules = [
                'museum_id' => ['exists:museums,id'],
                'photo' => ['image', 'mimes:jpeg,png,jpg']
            ];
        }

        return $rules;
    }
}
