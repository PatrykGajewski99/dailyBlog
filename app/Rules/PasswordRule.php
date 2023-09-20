<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class PasswordRule implements InvokableRule
{
    private string $regex = '^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$^';

    public function __invoke($attribute, $value, $fail): void
    {
        if (strlen($value) < 8) {
            $fail(self::charactersQuantityMessage());
        }

        if (!preg_match($this->regex, $value)) {
            $fail(self::specialSignsMessage());
        }
    }

    private function charactersQuantityMessage(): string
    {
        return __('validation.custom.password.characters_quantity');
    }

    private function specialSignsMessage(): string
    {
        return __('validation.custom.password.special_signs');
    }
}
