<?php

namespace App\Services\Auth\V1;

interface AuthInterface
{
    /**
     * Log user in.
     *
     * @param string $email the user email.
     * @param string $password the user password.
     *
     * @return array ['token' => 'token', 'type' => 'bearer', 'user' => 'user instance'] the authentication info.
     */
    public function login(string $email, string $password): array;
}
