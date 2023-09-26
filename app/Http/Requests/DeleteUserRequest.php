<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route('user')->id === $this->user()->id;
    }

    public function rules(): array
    {
        return [];
    }
}
