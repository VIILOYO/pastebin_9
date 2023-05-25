<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MetaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'per_page' => $this->resource->perPage(),
            'current_page' => $this->resource->currentPage(),
            'last_page' => $this->resource->lastPage(),
            'total' => $this->resource->total(),
        ];
    }
}
