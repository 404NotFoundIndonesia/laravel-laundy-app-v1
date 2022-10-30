<?php

namespace App\Enums;

enum OrderStatus: string
{
    case TODO           = 'todo';
    case IN_PROGRESS    = 'in_progress';
    case DONE           = 'done';
    case COMPLETED      = 'completed';

    public static function options()
    {
        $optionPathOrder = 'table.column.status.order.';
        return [
            OrderStatus::TODO->value => __($optionPathOrder . OrderStatus::TODO->value),
            OrderStatus::IN_PROGRESS->value => __($optionPathOrder . OrderStatus::IN_PROGRESS->value),
            OrderStatus::DONE->value => __($optionPathOrder . OrderStatus::DONE->value),
            OrderStatus::COMPLETED->value => __($optionPathOrder . OrderStatus::COMPLETED->value),
        ];
    }
}