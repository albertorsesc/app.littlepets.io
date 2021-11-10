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
            'slug' => $this->slug,
            'user' => $this->whenLoaded('user'),
            'name' => $this->name,
            'services' => $this->services,
            'specialty' => $this->specialty,
            'phone' => $this->phone,
            'email' => $this->email,
            'isOpenAtNight' => $this->is_open_at_night,
            'facebookProfile' => $this->facebook_profile,
            'site' => $this->site,
            'about' => $this->about,
            'status' => $this->status,
            'logo' => $this->logo,
            'location' => new LocationResource($this->whenLoaded('location')),
            'likes' => $this->whenLoaded('likes'),
            'meta' => [
                'profile' => $this->profile(),
                'createdAt' => $this->created_at->diffForHumans(),
                'updatedAt' => $this->updated_at->diffForHumans(),
                'publishedAt' => optional($this->published_at)->diffForHumans(),
            ]
        ];
    }
}
