<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    return [
            'bicycleId' => $this->bicycle_id,
            'userId'=> $this->user_id,
            'pathId' => $this->path_id,
            'recentActivityId'=> $this->recent_activity_id,
            'tempKey' => $this->temp_key
        ];
    }
}
