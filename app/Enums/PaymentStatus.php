<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PENDING    = 'pending';
    case PARTIAL    = 'partial';
    case PAID       = 'paid';

    public static function options()
    {
        $optionPathPayment = 'table.column.status.payment.';
        return [
            PaymentStatus::PENDING->value => __($optionPathPayment . PaymentStatus::PENDING->value),
            PaymentStatus::PARTIAL->value => __($optionPathPayment . PaymentStatus::PARTIAL->value),
            PaymentStatus::PAID->value => __($optionPathPayment . PaymentStatus::PAID->value),
        ];
    }
}