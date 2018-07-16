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
            'category_id' => 'required|integer|min:1',
            'product_id' => 'integer',
            'short' => 'required',
            'body' => 'required',
            'publish_at' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Naslov je obavezan',
            'category_id.required' => 'Kategorija je obavezna',
            'category_id.integer' => 'Kategorija je obavezna',
            'category_id.min' => 'Kategorija je obavezna',
            'short.required' => 'Kratak opis je obavezan',
            'body.required' => 'Opis je obavezan',
            'publish_at.required' => 'Datum publikovanja je obavezan',
            'publish_at.date' => 'Datum publikovanja nije u ispravnom formatu',
        ];
    }
}
