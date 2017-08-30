<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->latest();
    }
}
