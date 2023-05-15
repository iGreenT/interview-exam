<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class JsonAppResource extends JsonResource
{
    protected $isInternal = false;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->isInternal) {
            return $this->internalResource($request);
        }

        return $this->publicResource($request);
    }
    
    /**
     * internalData
     *
     * @return array
     */
    protected function internalResource($request): array
    {
        return $this->internalData($request);
    }

    /**
     * Public data
     *
     * @return array
     */
    abstract protected function internalData($request): array;

    /**
     * public data
     *
     * @return array
     */
    protected function publicResource($request): array
    {
        return $this->publicData($request);
    }

    /**
     * Public data
     *
     * @return array
     */
    abstract protected function publicData($request): array;
}
