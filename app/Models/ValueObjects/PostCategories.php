<?php

namespace App\Models\ValueObjects;

enum PostCategories: string
{
    case BEAUTY = 'beauty';
    case SPORT = 'sport';
    case FOOD = 'food';
    case LIFE = 'life';

    public static function getAllowedValues(): array
    {
        return [
            self::BEAUTY->value,
            self::SPORT->value,
            self::FOOD->value,
            self::LIFE->value,
        ];
    }
}
