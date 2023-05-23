<?php

namespace App\Enums;

enum PasteEnum: string
{
    case PUBLIC = 'public';
    case UNLISTED = 'unlisted';
    case PRIVATE = 'private';

}
