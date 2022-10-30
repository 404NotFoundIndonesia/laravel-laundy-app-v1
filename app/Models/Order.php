<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;

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

    public function scopeCurrentMonthIncome($query)
    {
        return $query
            ->where('user_id', auth()->user()->id)
            ->where('payment_status', PaymentStatus::PAID)
            ->whereMonth('ordered_at', now()->month)
            ->sum('total');
    }

    public function scopeCurrentMonthStatus($query, OrderStatus $status)
    {
        return $query
            ->where('user_id', auth()->user()->id)
            ->where('order_status', $status)
            ->whereMonth('ordered_at', now()->month)
            ->count();
    }

    public function scopeCurrentMonthTodo($query)
    {
        return $query->currentMonthStatus(OrderStatus::TODO);
    }

    public function scopeCurrentMonthInProgress($query)
    {
        return $query->currentMonthStatus(OrderStatus::IN_PROGRESS);
    }

    public function scopeCurrentMonthDone($query)
    {
        return $query->currentMonthStatus(OrderStatus::DONE);
    }

    public function scopeCurrentMonthCompleted($query)
    {
        return $query->currentMonthStatus(OrderStatus::COMPLETED);
    }

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
