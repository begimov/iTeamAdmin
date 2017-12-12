<?php

namespace App\Repositories\Eloquent\Payments;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Payments\PaymentStateRepository;
use App\Models\Payments\PaymentState;

class EloquentPaymentStateRepository extends EloquentRepositoryAbstract implements PaymentStateRepository
{
    public function entity()
    {
        return PaymentState::class;
    }
}
