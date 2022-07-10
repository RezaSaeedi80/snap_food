<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodsResource extends JsonResource
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
            'title' => $this->name,
            'price' => $this->price,
            'raw_material' => $this->materials,
            $this->mergeWhen($this->offer_id !== null, function () {
                return ['off' => [
                    'label' => $this->offer->persent,
                    'factor' => (100 - $this->offer->persent) / 100,
                ]];
            }),
            'image' => $this->image->path,
        ];
    }
}
