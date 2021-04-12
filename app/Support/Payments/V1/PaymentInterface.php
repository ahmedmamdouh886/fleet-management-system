<?php

namespace App\Support\Payment\V1;

use Illuminate\Pagination\LengthAwarePaginator;

interface PaymentInterface
{
    /**
     * Pay.
     */
    public function pay();
}
