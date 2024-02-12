<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LiveStrimengResources extends JsonResource
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
            "id" => $this->id,
            "uuid" => $this->uuid,
            "title" => $this->title,
            "live_url" => $this->live_url,
            "start_date" => $this->start_date,
            "start_time" => $this->start_time,
            "thumbnail_img" => $this->thumbnail_img,
            "temple" => $this->temple->name,
            "puja" => $this->puja->name,
        ];
    }
}

