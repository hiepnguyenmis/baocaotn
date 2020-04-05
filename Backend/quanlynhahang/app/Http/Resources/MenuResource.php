<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
            'FOOD_ID'=>$this->FOOD_ID,
            'FOOD_NO'=>$this->FOOD_NO,
            'FOOD_NAME'=>$this->FOOD_NAME,
            'FOOD_PRICE'=>$this->FOOD_PRICE,
            'FOOD_UNIT'=>$this->FOOD_UNIT,
            'FOOD_STATUS'=>$this->FOOD_STATUS,
            'FOOD_IMG'=>$this->FOOD_IMG,
            'CATEGORY'=>$this->CATEGORY,
            'INGREDIENT'=>$this->INGREDIENT
        ];
    }
}
