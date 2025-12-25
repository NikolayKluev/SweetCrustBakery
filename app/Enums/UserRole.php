<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';   
    case CUSTOMER = 'customer';

    // Опционально: получить читаемое имя роли
    public function label(): string
    {
        return match($this) {
            self::ADMIN => 'Администратор',            
            self::CUSTOMER => 'Клиент',
        };
    }

    // Все роли для выпадающего списка
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
