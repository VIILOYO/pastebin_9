<?php

namespace App\Exceptions;

use Exception;

class BanException extends AppHttpException
{
    /**
     * @var int
     */
    protected $code = 428;

    /**
     * @var string
     */
    protected $message = 'Вам бан';
}
