<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = '1';
    case NO = '0';

    public static function all(): array
    {
        return [
            self::ADMIN->value,
            self::NO->value,
        ];
    }
}
