<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required',
            'category_id' => 'required',
            'short' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Naslov je obavezan',
            'category_id.required' => 'Kategorija je obavezna',
            'short.required' => 'Kratak opis je obavezan',
            'body.required' => 'Opis je obavezan',
        ];
    }
}
