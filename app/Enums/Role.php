<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'Administrador';
    case RECEPTIONIST = 'Recepcionista';
    case doctor = 'Médico';
}
