<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionsResources extends JsonResource
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
            'POSITION_ID'=>$this->POSITION_ID,
            'POSITION_NAME'=>$this->POSITION_NAME,
            'POSITION_DES'=>$this->POSITION_DES
        ];
    }
}
