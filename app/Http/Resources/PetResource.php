<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
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
            'id' => $this->id,
            'user' => $this->whenLoaded('user'),
            'specie' => $this->whenLoaded('specie'),
            'name' => $this->name,
            'gender' => $this->gender,
            'size' => $this->size,
            'age' => $this->age,
            'ageRange' => $this->age_range,
            'images' => $this->whenLoaded('media')
        ];
    }
}
