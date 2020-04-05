<?php

namespace App\Http\Resources;

use App\Http\Resources\PositionsResources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeesResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'EMPLOYEES_ID'=>$this->EMPLOYEES_ID,
        // 'EMPLOYEES_NO'=>$this->EMPLOYEES_NO,
        // 'EMPLOYEES_NAME'=>$this->EMPLOYEES_NAME,
        // 'EMPLOYEES_PHONE'=>$this->EMPLOYEES_PHONE,
        // 'EMPLOYEES_EMAIL'=>$this->EMPLOYEES_EMAIL,
        // 'EMPLOYEES_PASSWORD'=>$this->EMPLOYEES_PASSWORD,
        // 'EMPLOYEES_IMG'=>$this->EMPLOYEES_IMG,
        // 'POSISION'=>new PositionsResources($this->Positions)
        // POSITION_ID
        return [
            'EMPLOYEES_ID'=>$this->EMPLOYEES_ID,
            'EMPLOYEES_NO'=>$this->EMPLOYEES_NO,
            'EMPLOYEES_NAME'=>$this->EMPLOYEES_NAME,
            'EMPLOYEES_PHONE'=>$this->EMPLOYEES_PHONE,
            'EMPLOYEES_EMAIL'=>$this->EMPLOYEES_EMAIL,
            'EMPLOYEES_PASSWORD'=>$this->EMPLOYEES_PASSWORD,
            'EMPLOYEES_IMG'=>$this->EMPLOYEES_IMG,
            'EMPLOYEES_STATUS'=>$this->EMPLOYEES_STATUS,
            'EMPLOYEES_POSITION'=>new PositionsResources($this->Positions)
        ];
    }
}
