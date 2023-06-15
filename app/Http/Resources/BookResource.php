<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'condition' => $this->condition,
            'price' => $this->price,
            'author' => new AuthorResource($this->whenLoaded('author')),
            'language' => $this->language,
        ];
    }
}
