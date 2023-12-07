<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Comments\Models\Comment as CommentModel;
use Illuminate\Support\Str;

class Comment extends CommentModel
{
    use HasFactory;

    protected $appends = ['author_name','author_avatar'];
    /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getAuthorNameAttribute()
    {
        return $this->commentator->name;
    }


    /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getAuthorAvatarAttribute()
    {
        return "https://picsum.photos/200#" . Str::random(3);
    }
}
