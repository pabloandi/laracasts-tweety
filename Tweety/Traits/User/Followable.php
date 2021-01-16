<?php

namespace Tweety\Traits\User;

use App\Models\User;

/**
 *
 */
trait Followable
{
    public function isFollowing(User $user)
    {
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    public function follow(User $user)
    {
        $this->follows()->toggle($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id','following_user_id');
    }
}
