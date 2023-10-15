<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use App\Traits\Liker;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Comments\Models\Concerns\InteractsWithComments;
use Spatie\Comments\Models\Concerns\Interfaces\CanComment;

class User extends Authenticatable implements CanComment
{
    use InteractsWithComments;
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;
    use Liker;

    protected $fillable = ['name', 'email', 'password'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
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
