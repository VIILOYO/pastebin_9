<?php

namespace lang\ru;

use App\Enums\PasteEnum;

return [
    PasteEnum::PUBLIC->value => 'public -- доступна всем, видна в списках',
    PasteEnum::PRIVATE->value => 'private -- доступна только автору',
    PasteEnum::UNLISTED->value => 'unlisted -- доступна только по ссылке'
];
