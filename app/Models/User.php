<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password', 'flat_id', 'role', 'cart_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function newsComments(){
        return $this->hasMany(NewsComments::class);
    }

    public function getUserInfo($flat_id){
        return  User::where('flat_id', $flat_id)
            ->get();
    }
}
