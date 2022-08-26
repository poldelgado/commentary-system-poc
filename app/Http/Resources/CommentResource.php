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
            'id' => $this->id,
            'username' => $this->username,
            'comment' => $this->comment,
            'parent_id' => $this->parent_id,
            'depth' => $this->depth,
            'replies' => $this->depth < 3 ? $this::collection($this->whenLoaded('replies')):[],
            'created_at' => $this->created_at->format('F jS, Y - h:i'),
        ];
    }
}
