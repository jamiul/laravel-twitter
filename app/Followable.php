<?php

namespace APP;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        if ($this->following($user)) {
            return $this->unfollow($user);
        }

        return $this->follow($user);
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }

    public function following(User $user)
    {
        // We can do it this way
        // return $this->follows->contains($user);
        // But the best way
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }
}
