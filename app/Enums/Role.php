<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case RECEPTIONIST = 'recepcionista';
    case doctor = 'medico';
}
