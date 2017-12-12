<?php

namespace App\Repositories\Eloquent\Payments;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Payments\PaymentTypeRepository;
use App\Models\Payments\PaymentType;

class EloquentPaymentTypeRepository extends EloquentRepositoryAbstract implements PaymentTypeRepository
{
    public function entity()
    {
        return PaymentType::class;
    }
}
