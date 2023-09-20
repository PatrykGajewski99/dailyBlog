<?php

namespace App\Models\ValueObjects;

enum CountryNames: string
{
    case POLAND = 'poland';
    case GERMANY = 'germany';
    case SPAIN = 'spain';
    case PORTUGAL = 'portugal';

    public static function getAllowedValues(): array
    {
        return [
          self::POLAND->value,
          self::GERMANY->value,
          self::SPAIN->value,
          self::PORTUGAL->value,
        ];
    }
}
