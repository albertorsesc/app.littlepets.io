<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdoptionResource extends JsonResource
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
            'phone' => $this->phone,
            'bio' => $this->bio,
            'story' => $this->story,
//            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'images' => $this->whenLoaded('media'),
            'meta' => [
                'profile' => $this->profile(),
                'publishedAt' => optional($this->published_at)->diffForHumans(),
                'adoptedAt' => optional($this->adopted_at)->diffForHumans(),
                'updatedAt' => $this->updated_at->diffForHumans()
            ]
        ];
    }
}
