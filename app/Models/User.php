<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Tweety\Traits\User\Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute()
    {
        return "https://i.pravatar.cc/200?u=" . $this->email;
    }

    public function getProfileRouteAttribute()
    {
        return route('profile', $this);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function timeline()
    {
        $follows = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id',$follows)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->take(5)
            ->get();
    }


    protected static function booting()
    {
        static::creating(function($user){
            $user->slug = Str::slug($user->name);
        });
    }
}
