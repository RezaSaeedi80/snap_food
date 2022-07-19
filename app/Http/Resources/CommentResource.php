<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'author' => [
                'name' => $this->user->name,
            ],
            'foods' => FoodCommentResource::collection($this->cart->cartItems),
            'created_at' => $this->created_at,
            'score' => $this->score,
            'content' => $this->message,
            $this->mergeWhen(($this->replies->first() !== null), [
                'answer' => $this->replies->first()?->message
            ]),
        ];
    }
}
