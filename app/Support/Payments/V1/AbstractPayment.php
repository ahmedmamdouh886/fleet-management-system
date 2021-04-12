<?php

namespace App\Support\Payment\V1;

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
