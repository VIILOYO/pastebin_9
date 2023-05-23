<?php

namespace App\Services\interfaces;

use App\DTO\Auth\RegistrationData;
use App\Models\User;

interface AuthServiceInterface
{
    /**
     * @param RegistrationData $data
     * @return User
     */
    public function registrationUser(RegistrationData $data): User;
}
