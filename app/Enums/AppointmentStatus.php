<?php

namespace App\Enums;

enum AppointmentStatus: string
{
    case SCHEDULED = 'scheduled';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';

    public function label(): string
    {
        return match ($this) {
            self::SCHEDULED => 'Agendado',
            self::COMPLETED => 'Completado',
            self::CANCELED => 'Cancelado',
        };
    }
}
