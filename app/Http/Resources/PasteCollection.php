<?php

namespace App\Http\Resources;

use App\Models\Paste;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @mixin LengthAwarePaginator<Paste>
 */
class PasteCollection extends JsonResource
{
    /**
     * @param $request
     * @return array<string, MetaResource|AnonymousResourceCollection>
     */
    public function toArray($request): array
    {
        return [
            'data' => PasteResource::collection($this->items()),
            'meta' => MetaResource::make($this),
        ];
    }
}
