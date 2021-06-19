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

    public function getImageUrlAttribute()
    {
        if ($this->image)
            return asset('uploads/user/' . $this->image);
        else
            return 'https://lh3.googleusercontent.com/proxy/9SXf-woW9vnVgpf7pGE70AJWvAwjwmYO3u0FkdQmmtVyMW0KG3CRfSkPU0CWFdpoaJQ6eBsv5HSxNuXibCnF2o6To0_D3zrKuJSZz6wInY8pzQn8nY8-S7S_zg5iiV_UZE2W4NU3zZstsA';
    } // return image path
}
