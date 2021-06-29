<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];
    public $timestamps = false;

    /*************************** Begin RELATIONS Area ****************************/
    public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFavorites($query)
    {
        return $query->where('likeable_type', 'App\Models\Course');
    }

    public function course()
    {
        return Course::where('id', $this->likeable_id)->first();
    }


    /*************************** Begin SCOPE Area *********************************/
    public function scopeCheckIfVisitor($query)
    {
        return $query->whereIpAddress(request()->ip())->whereAgent(request()->userAgent())->count();
    }

    public function scopeCreateVisitor($query)
    {
        return $query->create(['ip_address' => request()->ip(), 'agent' => request()->userAgent()]);
    }
}
