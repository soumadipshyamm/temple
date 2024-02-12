<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PujaResources extends JsonResource
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
        'id'=>$this->id,
        'uuid'=>$this->uuid,
        'name'=>$this->name,
        'title'=>$this->title,
        'slug'=>$this->slug,
        'temple_id'=>$this->temple_id,
        'description'=>$this->description,
        'live_strimeng_link'=>$this->live_strimeng_link,
        'puja_start_date'=>$this->puja_start_date,
        'puja_end_date'=>$this->puja_end_date,
        'puja_start_time'=>$this->puja_start_time,
        'puja_end_time'=>$this->puja_end_time,
        'thumbnals'=>$this->thumbnals,
        'temple'=> new TempleResources($this->temple),
    ];
    }
}


