<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->whenLoaded('user'),
            'title' => $this->title,
            'description' => $this->description,
            'startsAt' => $this->starts_at,
            'endsAt' => $this->ends_at,
            'comments' => [],
            'images' => [],
            'meta' => [
                'profile' => $this->profile(),
            ],
        ];
    }
}
