<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id' => $this->cart->id,
            'user_name' => $this->cart->user->name,
            'user_email' => $this->cart->user->email,
            'status' => $this->status,
            'price' => $this->totalPrice,
            // 'foods' => CartItemSellerResource::collection($this->cart->cartItems)
        ];
    }
}
