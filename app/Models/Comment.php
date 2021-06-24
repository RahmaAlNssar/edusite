<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_id'];

    /*************************** Begin RELATIONS Area ****************************/
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*************************** Begin SCOPE Area *********************************/
    public function scopePermission($query)
    {
    }
    /*************************** End SCOPE Area *********************************/
}
