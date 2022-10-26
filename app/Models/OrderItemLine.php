<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'quantity',
        'subtotal',
        'description',
        'plan_id',
        'order_id',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
