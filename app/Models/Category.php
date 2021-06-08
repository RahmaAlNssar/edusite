<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;


    protected $fillable = ['name', 'slug', 'order', 'visibility'];
    public $timestamps = false;

    /*************************** Begin RELATIONS Area ****************************/
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /*************************** Begin SCOPE Area *********************************/



    /*************************** Begin ATTRIBUTES Area ****************************/
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'name', 'onUpdate' => true,]];
    } // auto make slug from name field when create or update

    public function order()
    {
        return '<span class="badge badge-primary badge-pill">' . $this->order . '</span>';
    }

    public function visibilityType()
    {
        return $this->visibility == 1
            ? '<span class="badge badge-success"> <i class="fas fa-lightbulb"></i>&nbsp; Visible</span>'
            : '<span class="badge badge-warning"> <i class="far fa-lightbulb"></i>&nbsp; Hidden</span>';
    }
}
