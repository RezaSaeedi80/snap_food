<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkingTimeResturantResource extends JsonResource
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
            'saturday' => ($this->saturday !== null) ? [
                'start' => explode('-', $this->saturday)[0],
                'end' => explode('-', $this->saturday)[1],
            ] : null,
            'sunday' => ($this->sunday !== null) ? [
                'start' => explode('-', $this->sunday)[0],
                'end' => explode('-', $this->sunday)[1],
            ] : null,
            'monday' => ($this->monday !== null) ? [
                'start' => explode('-', $this->monday)[0],
                'end' => explode('-', $this->monday)[1],
            ] : null,
            'thusday' => ($this->thusday !== null) ? [
                'start' => explode('-', $this->thusday)[0],
                'end' => explode('-', $this->thusday)[1],
            ] : null,
            'wednesday' => ($this->wednesday !== null) ? [
                'start' => explode('-', $this->wednesday)[0],
                'end' => explode('-', $this->wednesday)[1],
            ] : null,
            'thursday' => ($this->thursday !== null) ? [
                'start' => explode('-', $this->thursday)[0],
                'end' => explode('-', $this->thursday)[1],
            ] : null,
            'friday' => ($this->friday !== null) ? [
                'start' => explode('-', $this->friday)[0],
                'end' => explode('-', $this->friday)[1],
            ] : null,
        ];
    }
}
