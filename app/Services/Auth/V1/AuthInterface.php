<?php

namespace App\Services\Auth\V1;

interface AuthInterface
{
    public function login(string $email, string $password): array;
}
