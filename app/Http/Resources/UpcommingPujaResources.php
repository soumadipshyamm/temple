<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UpcommingPujaResources extends JsonResource
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
            'live'=>  LiveStrimengResources::collection($this->livestreaming),
        ];

        // return [
        //     "id" => $this->id,
        //     "uuid" => $this->uuid,
        //     "title" => $this->title,
        //     "live_url" => $this->live_url,
        //     "start_date" => $this->start_date,
        //     "start_time" => $this->start_time,
        //     "thumbnail_img" => $this->thumbnail_img,
        //     // "temple" => $this->temple->name,
        //     // "puja_q" => $this->puja->temple->name,
        //     // "temple" => new TempleResources($this->temple),
        //     "puja" => new PujaResources($this->puja),

        // ];
    }
}
