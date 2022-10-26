<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'ordered_at',
        'finished_at',
        'total',
        'down_payment',
        'payment',
        'change',
        'payment_status',
        'order_status',
        'customer_id',
        'user_id',
    ];

    public function scopeRender($query, $search, $page = 10)
    {
        return $query
            ->with(['itemLines', 'customer'])
            ->where('user_id', auth()->user()->id)
            ->search($search)
            ->paginate($page)
            ->appends([
                'search' => $search,
                'num_page' => $page,
            ]);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function($query, $find) {
            return $query->where('id', $find);
        });
    }

    public function itemLines()
    {
        return $this->hasMany(OrderItemLine::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
