<?php

namespace Tweety\Traits\Tweet;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 *
 */
trait Likeable
{
    public function like(User $user = null, $liked = true)
    {
        return $this->likes()->updateOrCreate([
            'user_id'   =>  $user ? $user->id : auth()->id,
        ],[
            'liked'     =>  $liked
        ]);
    }

    public function dislike(User $user)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(not liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }
}
