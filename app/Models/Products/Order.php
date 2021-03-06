<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;
use App\Models\Payments\PaymentType;
use App\Models\Payments\PaymentState;
use App\Models\Products\Product;

use App\Filters\Products\OrderFilters;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'product_id',
        'payment_type_id',
        'payment_state_id',
        'price',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
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

    public function scopeFilter($builder, $repository, $request, array $filters = [])
    {
        return (new OrderFilters($request))->add($filters)->filter($repository);
    }
}
