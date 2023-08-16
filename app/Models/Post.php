<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Post extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'body'];
    protected $appends = [ 'screen'];

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
}
