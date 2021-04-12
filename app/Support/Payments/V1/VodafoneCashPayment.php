<?php

namespace App\Support\Payment\V1;

use App\Models\Route;
use App\Models\Trip as TripModel;
use Illuminate\Pagination\LengthAwarePaginator;

class VodafoneCashPayment extends AbstractPayment
{
    protected $paymentWay = 'Vodafone cash';

    /**
     * Pay.
     */
    public function pay()
    {
        // TODO: Payment implementation.
    }
}
