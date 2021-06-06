<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'slug', 'image', 'description', 'price', 'discount', 'category_id', 'user_id'];

    /*************************** Begin RELATIONS Area ****************************/
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }

    /*************************** Begin SCOPE Area *********************************/



    /*************************** Begin ATTRIBUTES Area ****************************/
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title', 'onUpdate' => true,]];
    } // auto make slug from name field when create or update

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return '<img src=' . asset('storage/' . $this->image) . ' height="100px" weidth="90">';
        }
        return false;
    }

    public function Total()
    {
        return $this->price - ($this->price *  $this->discount / 100);
    } // return the price after discount
}
