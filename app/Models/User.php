<?php

namespace App\Models;

use App\{
    Models\People\UserReference\UserReference,
};

use Illuminate\{
    Database\Eloquent\Factories\HasFactory,
    Foundation\Auth\User as Authenticatable,
    Notifications\Notifiable,

};

use Laravel\{
    Sanctum\HasApiTokens
};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'email','password','last_login_ip', 
        'last_login_device', 'last_active_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userReference(){return $this->hasOne(UserReference::class, 'user_id');}
    public function getNameAttribute(){return $this->userReference?->ref?->name ?? '-';}
}
