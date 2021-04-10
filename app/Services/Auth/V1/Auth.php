<?php

namespace App\Services\Auth\V1;

use App\Exceptions\InvalidCredentialExcption;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Auth implements AuthInterface
{
    /**
     * User model instance.
     *
     * @var.
     */
    protected $user;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Log user in.
     *
     * @param string $email the user email.
     * @param string $password the user password.
     *
     * @return array ['token' => 'token', 'type' => 'bearer', 'user' => 'user instance'] the authentication info.
     */
    public function login(string $email, string $password): array
    {
        if (! FacadesAuth::attempt(['email' => $email, 'password' => $password])) {
            throw new InvalidCredentialExcption('Invalid email/password');
        }

        $user = $this->user->findByEmail($email);

        return [
            'token' => $user->createToken('robusta_token')->plainTextToken,
            'type' => 'bearer',
            'user' => $user,
        ];
    }
}
