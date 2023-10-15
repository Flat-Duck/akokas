@props([
    'comment' => null,
])
@php
    /** @var ?\Spatie\Comments\Models\Comment $comment */
    $avatar = $comment?->commentatorProperties()?->avatar;

    if (! $avatar) {
        $defaultImage = Spatie\Comments\Support\Config::getGravatarDefaultImage();
        $avatar = "https://www.gravatar.com/avatar/unknown?d={$defaultImage}";

        if ($user = auth()->user()) {
            $segment = md5(strtolower($user->email));
            $avatar = "https://www.gravatar.com/avatar/{$segment}?d={$defaultImage}";
        }
    }
@endphp
<img
    class="comments-avatar"
    src="{{ $avatar }}"
    alt="{{ trim("{$comment?->commentatorProperties()?->name} avatar") }}"
>
