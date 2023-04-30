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
            'type' => $this->type,
            'condition' => $this->condition,
            'description' => $this->description,
            'stock' => $this->stock,
            'price' => $this->price,
            'author' => $this->author,
            'language' => $this->language,
            'numberOfPages' => $this->number_of_pages,
            'publicationDate' => $this->publication_date,
        ];
    }
}
