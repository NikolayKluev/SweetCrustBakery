<?php

namespace App\Enums;

enum OrdersStatus: string
{
    case PENDING = 'pending';   
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';

    // Опционально: получить читаемое имя роли
    public function label(): string
    {
        return match($this) {
            self::PENDING => 'В ожидании',            
            self::COMPLETED => 'Завершен',
            self::CANCELED => 'Отменен',
        };
    }

    // Все роли для выпадающего списка
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
