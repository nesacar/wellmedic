<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBoxRequest extends FormRequest
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
            'block_id' => 'required|min:1',
            'title' => 'required',
            'link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'block_id.required' => 'Šablon je obavezan',
            'block_id.min' => 'Šablon je obavezan',
            'title.required' => 'Naslov je obavezan',
            'link.required' => 'Link je obavezan',
        ];
    }
}
