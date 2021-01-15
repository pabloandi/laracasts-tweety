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
        # code...
    }

    public function follow(User $user)
    {
        return $this->follows()->attach($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id','following_user_id');
    }
}
