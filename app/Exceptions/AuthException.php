<?php

namespace App\Exceptions;

class AuthException extends AppHttpException
{
    /**
     * @var int
     */
    protected $code = 403;

    /**
     * @var string
     */
    protected $message = 'Неверные данные';
}
