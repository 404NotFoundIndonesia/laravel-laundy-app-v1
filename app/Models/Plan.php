<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'plan',
        'price',
        'description',
        'user_id',
    ];
    
    public function scopeRender($query, $search, $page = 10)
    {
        return $query
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
            return $query
                ->where('code', 'LIKE', $find . '%');
        });
    }
}
