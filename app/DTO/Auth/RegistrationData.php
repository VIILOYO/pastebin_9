<?php

namespace App\DTO\Auth;

use Atwinta\DTO\DTO;

class RegistrationData extends DTO
{
    /**
     * @param string $name
     * @param string $password
     */
    public function __construct(
        public readonly string $name,
        public readonly string $password
    )
    {}
}
