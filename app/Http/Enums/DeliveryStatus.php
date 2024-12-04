<?php

namespace App\Http\Enums;

enum DeliveryStatus: int
{
    case PENDING = 0;
    case PROCESSING = 1;
    case COMPLETED = 2;
    case CANCELED = 3;

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Na čekanju',
            self::PROCESSING => 'U obradi',
            self::COMPLETED => 'Završeno',
            self::CANCELED => 'Otkazano',
        };
    }
}