<?php

namespace App\Http\Requests\Customer;

use App\Models\ValueObjects\CountryNames;
use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'            => ['required', 'string', 'max:64', 'min:2'],
            'last_name'             => ['required', 'string', 'max:64', 'min:2'],
            'phone_number'          => ['required', 'string', 'min:9', 'max:12', 'unique:users'],
            'email'                 => ['required', 'email', 'unique:users'],
            'country'               => ['required', Rule::in(CountryNames::getAllowedValues())],
            'town'                  => ['nullable', 'string'],
            'password'              => ['string', new PasswordRule()],
            'password_confirmation' => ['required', 'same:password']
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'first_name' => [
                'description' => 'User first name',
                'example'     => 'Patryk',
            ],
            'last_name' => [
                'description' => 'User last name',
                'example'     => 'Gajewski',
            ],
            'phone_number' => [
                'description' => 'User phone number',
                'example'     => '777878787',
            ],
            'email' => [
                'description' => 'User email',
                'example'     => 'example@gmail.com',
            ],
            'country' => [
                'description' => 'User country of origin. Possible to add (poland,germany,spain,portugal)',
                'example'     => 'Poland',
            ],
            'town' => [
                'description' => 'Town name where user live.',
                'example'     => 'Warsaw',
            ],
            'password' => [
                'description' => 'Password should have min one capital, number and special character',
                'example'     => 'Qwerty123#',
            ],
            'password_confirmation' => [
                'description' => 'Confirmation password which has to be the same like password above',
                'example'     => 'Qwerty123#',
            ],
        ];
    }
}
