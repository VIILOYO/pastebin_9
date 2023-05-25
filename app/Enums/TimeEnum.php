<?php

namespace App\Enums;

enum TimeEnum: string
{
    case PUBLIC = 'public';
    case UNLISTED = 'unlisted';
    case PRIVATE = 'private';

}

