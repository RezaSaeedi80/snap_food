<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResturantResource extends JsonResource
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
            'title' => ucfirst($this->name),
            'type' => $this->categories->first()->name,
            'address' => new AddressResturantResource($this->addresses->first()),
            'is_open' => ($this->is_open === 1) ? true : false,
            'image' => $this->image->path,
            'comment_count' => $this->comment_count,
            'schedule' => new WorkingTimeResturantResource($this->time_working)
        ];
    }
}
