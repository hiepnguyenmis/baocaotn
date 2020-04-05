<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryFoodResource extends JsonResource
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
            'CATEGORYFOODS_ID'=>$this->CATEGORYFOODS_ID,
            'CATEGORYFOODS_NAME'=>$this->CATEGORYFOODS_NAME,
            'CATEGORYFOODS_DES'=>$this->CATEGORYFOODS_DES
        ];
    }
}
