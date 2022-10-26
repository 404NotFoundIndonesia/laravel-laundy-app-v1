<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PENDING    = 'pending';
    case PARTIAL    = 'partial';
    case PAID       = 'paid';
}