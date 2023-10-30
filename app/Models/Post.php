<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Comments\Models\Concerns\HasComments;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Post extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    use Searchable;
    use HasComments;

    use Likeable;

    protected $fillable = ['user_id', 'body'];
    protected $appends = [ 'screen','likes_count','comments_count'];
    protected $with = ['comments'];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getScreenAttribute()
    {
        // $url = 'https://eu.ui-avatars.com/api/?name=' .urlencode($this->name);

        $cover = $this->getMedia('post_screens')->last();
        return $cover? $cover->getUrl(): null;

    }

    /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getLikesCountAttribute()
    {
        return $this->likers()->count();

    }

    /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();

    }

    /*
    * This string will be used in notifications on what a new comment
    * was made.
    */
    public function commentableName(): string
    {
        //
    }

    /*
    * This URL will be used in notifications to let the user know
    * where the comment itself can be read.
    */
    public function commentUrl(): string
    {

    }
}
