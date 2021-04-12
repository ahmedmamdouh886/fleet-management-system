<?php

namespace App\Support\Payment\V1;

use App\Models\Route;
use App\Models\Trip as TripModel;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractPayment implements PaymentInterface
{
    protected $paymentWay = 'None';
    
    /**
     * Pay.
     */
    public function pay()
    {
        // TODO: Payment implementation.
    }

    /**
     * Pay.
     */
    public function getPatmentWay()
    {
        return $this->paymentWay;
    }
}
