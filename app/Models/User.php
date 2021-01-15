<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
        return "https://i.pravatar.cc/40?u=" . $this->email;
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

    public function follow(User $user)
    {
        return $this->follows()->attach($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id','following_user_id');
    }



    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }





    protected static function booting()
    {
        static::creating(function($user){
            $user->slug = Str::slug($user->name);
        });
    }
}
