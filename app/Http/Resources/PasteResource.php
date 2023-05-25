<?php

namespace App\Http\Resources;

use App\Models\Paste;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Paste
 */
class PasteResource extends JsonResource
{
    /**
     * @param $request
     * @return string[]
     */
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'url' => $this->url,
            'text' => $this->text,
            'access_restriction' => $this->access_restriction,
            'language' => $this->language,
        ];
    }
}
