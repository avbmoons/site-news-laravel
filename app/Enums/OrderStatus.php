<?php

declare(strict_types=1);

namespace App\Enums;

enum OrderStatus: string
{
    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case BLOCKED = 'blocked';
    case CANCELED = 'canceled';

    public static function all(): array
    {
        return [
            self::DRAFT->value,
            self::ACTIVE->value,
            self::BLOCKED->value,
            self::CANCELED->value,
        ];
    }
}
