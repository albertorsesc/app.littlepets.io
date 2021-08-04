<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LostPetResource extends JsonResource
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
            'pet' => new PetResource($this->whenLoaded('pet')),
            'title' => $this->title,
            'postType' => $this->post_type,
            'phone' => $this->phone,
            'description' => $this->description,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'meta' => [
                'profile' => $this->profile(),
                'publishedAt' => optional($this->published_at)->diffForHumans(),
                'lostAt' => optional($this->lost_at)->diffForHumans(),
                'foundAt' => optional($this->found_at)->diffForHumans(),
                'rescuedAt' => optional($this->rescued_at)->diffForHumans(),
                'updatedAt' => $this->updated_at->diffForHumans(),
            ]
        ];
    }
}
