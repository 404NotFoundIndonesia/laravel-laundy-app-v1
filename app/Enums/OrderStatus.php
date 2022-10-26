<?php

namespace App\Enums;

enum OrderStatus: string
{
    case TODO           = 'todo';
    case IN_PROGRESS    = 'in_progress';
    case DONE           = 'done';
    case COMPLETED      = 'completed';
}