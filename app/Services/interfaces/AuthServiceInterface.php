<?php

namespace App\Services\interfaces;

use App\DTO\Auth\AuthData;
use App\Models\Paste;
use App\Models\User;

interface AuthServiceInterface
{
    /**
     * @param AuthData $data
     * @return User
     */
    public function registrationUser(AuthData $data): User;

    /**
     * @param AuthData $data
     * @return User|null
     */
    public function findUser(AuthData $data): User|null;
}
