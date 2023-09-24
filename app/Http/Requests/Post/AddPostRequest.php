<?php

namespace App\Http\Requests\Post;

use App\Models\ValueObjects\PostCategories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'         => ['required', 'uuid', 'exists:users,id'],
            'category'        => ['required', Rule::in(PostCategories::getAllowedValues())],
            'title'           => ['required', 'string', 'max:256'],
            'description'     => ['required', 'string', 'max:256'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'user_id' => [
              'description'   => 'User id',
              'example'       => '9a2e1b3e-8d29-41bc-b341-bf8804a5ce62',
            ],
            'category' => [
                'description' => 'Category of blog post. Possible to use beauty, food, life, sport',
                'example'     => 'food',
            ],
            'title' => [
                'description' => 'Title of blog post',
                'example'     => 'Eating a lof of sweets are unhealthy',
            ],
            'description' => [
                'description' => 'Blog post description',
                'example'     => 'In 1999 Michael J wrote that eating a lot of sweets involved on our health'
            ]
        ];
    }
}
