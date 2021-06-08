<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'slug', 'visibility', 'icon'];
    public $timestamps = false;


    /*************************** Begin RELATIONS Area ****************************/
    public function posts()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }


    /*************************** Begin SCOPE Area *********************************/



    /*************************** Begin ATTRIBUTES Area ****************************/
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'name', 'onUpdate' => true,]];
    } // auto make slug from name field when create or update

    public function visibilityType()
    {
        return $this->visibility == 1
            ? '<span class="badge badge-success"> <i class="fas fa-lightbulb"></i>&nbsp; Visible</span>'
            : '<span class="badge badge-warning"> <i class="far fa-lightbulb"></i>&nbsp; Hidden</span>';
    }
}
