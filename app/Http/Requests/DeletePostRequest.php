<?php

namespace App\Http\Requests;

use App\Http\Requests\Post\PostRequest;

class DeletePostRequest extends PostRequest
{
    public function rules(): array
    {
        return [];
    }
}
