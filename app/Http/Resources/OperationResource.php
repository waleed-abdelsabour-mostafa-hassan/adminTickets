<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OperationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user'             => $this->user,
            'service'          => $this->service,
            'supervisor'       => $this->supervisor,
            'region'           => $this->region,
        ];
        //return parent::toArray($request);
    }
}
