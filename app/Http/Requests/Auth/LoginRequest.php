<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $credentials = $this->all();
        $column =  filter_var(isset($credentials['identifier']) ? $credentials['identifier'] : 'fake.@gmail.com', FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $rules = [
            'identifier' => 'required|string',
            'password' => 'required|string',
            'recaptcha_token' => 'nullable|string'
        ];

        if ($column === 'email') {
            // $rules['identifier'] = 'email:dns';
        } elseif ($column === 'phone') {
            $rules['identifier'] = 'string|min:10|max:15';
        }

        return $rules;
    }
}
