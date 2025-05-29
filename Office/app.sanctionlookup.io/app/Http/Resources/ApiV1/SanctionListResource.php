<?php

declare(strict_types=1);

namespace App\Http\Resources\ApiV1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $code
 * @property string $title
 * @property string $description
 * @property string $publisher
 * @property int $number_of_entities
 * @property int $number_of_names
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $publisher_last_updated_at
 */
class SanctionListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'title' => $this->title,
            'description' => $this->description,
            'publisher' => $this->publisher,
            'number_of_entities' => $this->number_of_entities,
            'number_of_names' => $this->number_of_names,
            'updated_at' => $this->updated_at?->format('c'),
            'publisher_last_updated_at' => $this->publisher_last_updated_at?->format('c'),
        ];
    }
}
