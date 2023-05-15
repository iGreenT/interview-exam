<?php

namespace App\Modules\Product\Http\Resources;

use App\Http\Resources\JsonAppResource;

class ProductResource extends JsonAppResource
{
    /**
     * Transform the resource into an array.
     * For external data
     *
     * @param  Request $request
     * @return array
     */
    public function internalData($request): array
    {
        return [
            'id' => $this->id,
        ];
    }

    /**
     * Transform the resource into an array.
     * For external data
     *
     * @param  Request $request
     * @return array
     */
    public function publicData($request): array
    {
        return [
            'name'          => $this->name,
            'description'   => $this->description,
            'short_code'    => $this->short_code,
            'category'      => $this->category->name,
            'price'         => $this->price,
        ];
    }
}