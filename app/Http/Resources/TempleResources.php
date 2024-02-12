<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TempleResources extends JsonResource
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
            'name' => $this->name,
            'title' => $this->title,
            'country_id' => $this->city->state->country->name,
            'state_id' => $this->city->state->name,
            'city_id' => $this->city->name,
            'email' => $this->email,
            'postal_code' => $this->postal_code,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'lat' => $this->lat,
            'long' => $this->long,
            'rules' => $this->rules,
            'history' => $this->history,
            'description' => $this->description,
            'consecrated_deity' => $this->consecrated_deity,
            'temple_existence' => $this->temple_existence,
            'special_poojas_sevas' => $this->special_poojas_sevas,
            'accommodation' => $this->accommodation,
            'temple_transport' => $this->temple_transport,
            'temple_authority' => $this->temple_authority,
            'books_magazines' => $this->books_magazines,
            'temple_donations' => $this->temple_donations,
            'tradition' => $this->tradition,
            'publication' => $this->publication,
            'img' => $this->img,
            'booking' => $this->booking,
            'darshanTime' => DarshanTimeResources::collection($this->darshanTime),
            'sliderImg' => SliderResources::collection($this->sliderImg),
        ];
    }
}
