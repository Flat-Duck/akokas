<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "body" => $this->body,
            "screen"=> $this->screen,
            "author_name"=> $this->author_name,
            "author_avatar"=> $this->author_avatar,
            "author_id" => 3,
            "has_liked"=> $this->has_liked,
            "likes_count"=> $this->likes_count,
            "comments_count"=> $this->comments_count,
            "comments"=> CommentResource::collection($this->comments),
            "created_at"=> $this->created_at,
            "updated_at"=> $this->updated_at,
        ];
    }
}
