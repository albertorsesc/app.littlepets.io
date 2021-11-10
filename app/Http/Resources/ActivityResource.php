<?php

namespace App\Http\Resources;

use App\Models\Adoptions\Adoption;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ActivityResource extends JsonResource
{
    private function mapSubjects()
    {
        switch (Str::before($this->type, '_')) {
            case Str::snake(class_basename(Veterinary::class)):
                $this->subject()->load(['location.state']);

                return new VeterinaryResource($this->whenLoaded('subject'));
                break;

            case Str::snake(class_basename(Adoption::class)):
                $this->subject()->load(['pet.media', 'location.state']);

                return new AdoptionResource(
                    $this->whenLoaded('subject')
                );
                break;
        }
    }

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
            'subject' => $this->mapSubjects(),
            'type' => $this->type,
        ];
    }
}
