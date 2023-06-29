<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookShowResource extends JsonResource
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
            'slug' => $this->slug,
            'condition' => $this->condition,
            'description' => $this->description,
            'stock' => $this->stock,
            'price' => $this->price,
            'language' => $this->language,
            'page' => $this->page,
            'publicationDate' => $this->publication_date->format('d m Y'),
            'author' => new AuthorResource($this->author),
            'genres'=> GenreResource::collection($this->genres),

        ];
    }
}
