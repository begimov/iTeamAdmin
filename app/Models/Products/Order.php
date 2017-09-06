<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Payments\PaymentType;
use App\Models\Payments\PaymentState;
use App\Models\Products\Product;

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

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function paymentState()
    {
        return $this->belongsTo(PaymentState::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
