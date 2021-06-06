<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'video', 'type', 'course_id'];

    /*************************** Begin RELATIONS Area ****************************/
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /*************************** Begin SCOPE Area *********************************/



    /*************************** Begin ATTRIBUTES Area ****************************/
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title', 'onUpdate' => true,]];
    } // auto make slug from name field when create or update

    public function getVideoPathAttribute()
    {
        return asset('uploads/videos/' . $this->video);
    } // To Return The Image Path
}