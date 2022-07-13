<?php

namespace App\Http\Resources;

use App\Models\CartItem;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'is_pay' => $this->is_pay,
            'resturant' => [
                'title' => $this->resturant->name,
                'image' => $this->resturant->image->path,
            ],
            'foods' => CartItemResource::collection($this->cartItems),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
