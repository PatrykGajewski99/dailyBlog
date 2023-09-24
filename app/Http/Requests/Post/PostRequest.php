<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

abstract class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route('post')->user_id === $this->user()->id;
    }
}
