<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case UNPAID = 'unpaid';   
    case PAID = 'paid';    

    // Опционально: получить читаемое имя роли
    public function label(): string
    {
        return match($this) {
            self::UNPAID => 'Не оплачен',            
            self::PAID => 'Оплачен',            
        };
    }

    // Все роли для выпадающего списка
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
