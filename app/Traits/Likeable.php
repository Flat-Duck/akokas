<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Likeable
{
    public function isLikedBy(Model $user): bool
    {
        if (\is_a($user, User::class ?? config('auth.providers.users.model'))) {
            if ($this->relationLoaded('likers')) {
                return $this->likers->contains($user);
            }

            return $this->likers()->where('user_id', $user->getKey())->exists();
        }

        return false;
    }

    /**
     * Return followers.
     */
    public function likers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class ?? config('auth.providers.users.model'),
            'likes',
            'likeable_id',
            'user_id'
        )
            ->where('likeable_type', $this->getMorphClass());
    }

    protected function totalLikers(): Attribute
    {
        return Attribute::get(function () {
            return $this->likers()->count() ?? 0;
        });
    }
}
