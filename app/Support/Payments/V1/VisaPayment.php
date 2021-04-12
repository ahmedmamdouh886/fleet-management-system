<?php

namespace App\Support\Payment\V1;

use App\Models\Route;
use App\Models\Trip as TripModel;
use Illuminate\Pagination\LengthAwarePaginator;

class VisPayment extends AbstractPayment
{
    protected $paymentWay = 'Visa';

    /**
     * Pay.
     */
    public function pay()
    {
        // TODO: Payment implementation.
    }
}
