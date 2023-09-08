<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Events\Liked;
use App\Events\Unliked;

class Like extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => Liked::class,
        'deleted' => Unliked::class,
    ];

    public function __construct(array $attributes = [])
    {
        $this->table = 'likes';

        parent::__construct($attributes);
    }

    protected static function boot()
    {
        parent::boot();

        self::saving(function ($like) {
            $userForeignKey = 'user_id';
            $like->{$userForeignKey} = $like->{$userForeignKey} ?: auth()->id();

            if (false) { // Use uuid as primary key.
                $like->{$like->getKeyName()} = $like->{$like->getKeyName()} ?: (string) Str::orderedUuid();
            }
        });
    }

    public function likeable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        $userModel = User::class ?? config('auth.providers.users.model');

        return $this->belongsTo($userModel, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function liker()
    {
        return $this->user();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithType(Builder $query, string $type)
    {
        return $query->where('likeable_type', app($type)->getMorphClass());
    }
}
