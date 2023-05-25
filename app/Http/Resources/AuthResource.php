<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class AuthResource extends JsonResource
{
    /**
     * @param $request
     * @return string[]
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
