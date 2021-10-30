<?php

namespace App\Http\Resources;

use App\Models\Adoptions\Adoption;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
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
            'slug' => $this->slug,
            'name' => $this->name,
            'type' => $this->type,
            'phone' => $this->phone,
            'email' => $this->email,
            'capacity' => (int) $this->capacity,
            'facebookProfile' => $this->facebook_profile,
            'site' => $this->site,
            'about' => $this->about,
            'owner' => $this->owner,
            'logo' => $this->logo,
            'adoptions' => AdoptionResource::collection($this->adoptions()),
            'meta' => [
                'profile' => $this->profile(),
                'publishedAt' => optional($this->published_at)->diffForHumans(),
                'verifiedAt' => optional($this->verified_at)->format('d-m-Y')
            ]
        ];
    }
}
