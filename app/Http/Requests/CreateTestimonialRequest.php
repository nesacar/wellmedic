<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestimonialRequest extends FormRequest
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
            'body' => 'required',
            'author' => 'required',
            'publish_at' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Tekst je obavezan',
            'author.required' => 'Autor je obavezan',
            'publish_at.required' => 'Vreme publikovanja je obavezno',
            'publish_at.date' => 'Vreme publikovanja nije u ispravnom formatu',
        ];
    }
}
