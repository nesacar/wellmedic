<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldpassword' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'oldpassword.required' => 'Stara lozinka je obavezna',
            'oldpassword.min' => 'Stara lozinka mora imati minimum 6 karaktera',
            'password.required' => 'Lozinka je obavezna',
            'password.min' => 'Lozinka mora imati minimum 6 karaktera',
            'password.confirmed' => 'Niste ispravno potvrdili lozinku',
        ];
    }
}
