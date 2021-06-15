<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'is_admin'];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];

    /*************************** Begin RELATIONS Area ****************************/


    /*************************** Begin SCOPE Area *********************************/


    /*************************** Begin ATTRIBUTES Area ****************************/
    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::make(($value));
    } // Auto Hash Password
}
