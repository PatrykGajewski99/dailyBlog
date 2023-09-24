<?php

namespace App\Http\Requests\Post;

use App\Models\ValueObjects\PostCategories;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'category'        => ['nullable', Rule::in(PostCategories::getAllowedValues())],
            'title'           => ['nullable', 'string', 'max:256'],
            'description'     => ['nullable', 'string', 'max:256'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
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
