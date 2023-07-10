<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { 

        return [
            'id' =>$this->id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'phone_number'=>$this->phone_number,
            'balance'=> round( $this->balance,2),
            "created_at"=>$this->created_at
        ];
    }
}
