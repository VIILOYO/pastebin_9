<?php

namespace App\DTO\Paste;

use Atwinta\DTO\DTO;
use Carbon\Carbon;

class PasteData extends DTO
{
    /**
     * @param string $title
     * @param string $text
     * @param string|null $url
     * @param int|null $user_id
     * @param int $expiration_time
     * @param Carbon|null $time_to_delete
     * @param string $access_restriction
     * @param string $language
     */
    public function __construct(
        public readonly string $title,
        public readonly string $text,
        public ?string $url,
        public ?int $user_id,
        public readonly int $expiration_time,
        public ?Carbon $time_to_delete,
        public readonly string $access_restriction,
        public readonly string $language
    )
    {}
}
