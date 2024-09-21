<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'modality' => $this->modality,
            'location' => $this->location,
            'type' => $this->type,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
            'user_id' => $this->user_id,
        ];
    }
}
