<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VeterinaryResource extends JsonResource
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
            'name' => $this->name,
            'services' => $this->services,
            'phone' => $this->phone,
            'isOpenAtNight' => $this->is_open_at_night,
        ];
    }
}
