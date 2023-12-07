<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'author_name' => $this->author_name,
            'author_avatar' => $this->author_avatar,
            'commentator_id' => $this->commentator_id,
            'commentable_id' => $this->commentable_id,
            'parent_id' => $this->parent_id,
            'original_text' => $this->original_text,
            'text' => $this->text,
            'extra' => $this->extra,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
