<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlliedServicesResources extends JsonResource
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
            "url" => $this->url,
            "description" => $this->description,
            "date" => $this->date,
            "time" => $this->time,
            "thumbnail_img" => url('/thumbnail_img/' . $this->thumbnail_img),
            "temple_id" => $this->temple->name,

        ];
    }
}
