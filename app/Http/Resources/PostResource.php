<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Return only data id and title
        // not content
        return [
            'id' => $this->id,
            'title' => $this->title,
            'terserah' => 'Data Terserah tidak ada dalam database'
        ];


        // Return all data
        // return parent::toArray($request);
    }
}
