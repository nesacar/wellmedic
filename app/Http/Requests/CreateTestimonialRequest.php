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
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Tekst je obavezan',
            'author.required' => 'Autor je obavezan',
        ];
    }
}
