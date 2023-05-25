<?php

namespace App\Exceptions;

use Exception;

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
