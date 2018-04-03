<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'collection_id' => 'required|integer',
            'overTitle' => 'required',
            'subTitle' => 'required',
            'short' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Naslov je obavezan',
            'collection_id.required' => 'Kolekcija je obavezna',
            'collection_id.integer' => 'Kolekcija nije u ispravnom formatu',
            'overTitle.required' => 'Nadnaslov je obavezan',
            'subTitle.required' => 'Podnaslov je obavezan',
            'short.required' => 'Kratak opis je obavezan',
            'body.required' => 'Opis je obavezan',
        ];
    }
}
