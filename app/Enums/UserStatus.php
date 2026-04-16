<?php

namespace App\Enums;

enum UserStatus: string
{
    case ACTIVE = 'Ativo';
    case INACTIVE = 'Inativo';
}
