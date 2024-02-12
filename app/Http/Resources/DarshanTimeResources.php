<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class DarshanTimeResources extends JsonResource
{
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
            'uuid' => $this->uuid,
            'start_time' => Carbon::createFromFormat('H:i:s', $this->start_time)->format('h:i A'),
            'end_time' => Carbon::createFromFormat('H:i:s', $this->end_time)->format('h:i A'),
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}

