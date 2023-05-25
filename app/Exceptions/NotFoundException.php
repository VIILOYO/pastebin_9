<?php

namespace App\Exceptions;

class NotFoundException extends AppHttpException
{

    /**
     * @var string
     */
    protected $code = "404";

    /**
     * @var string
     */
    protected $message = "Entity not found";
}
