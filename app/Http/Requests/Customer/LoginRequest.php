<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'     => ['required', 'email', 'exists:users'],
            'password'  => ['required', 'string'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'email' => [
                'description' => 'User email',
                'example'     => 'example@gmail.com',
            'password' => [
                'description' => 'Password should have min one capital, number and special character',
                'example'     => 'Qwerty123#',
                ],
            ]
        ];
    }
}
