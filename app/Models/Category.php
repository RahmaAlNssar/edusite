<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;


    protected $fillable = ['name', 'slug', 'order', 'is_active'];
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
        return '<span class="badge badge-primary badge-pill float-right">' . $this->order . '</span>';
    }

    public function isActive()
    {
        return $this->is_active == 1
            ? '<span class="badge badge-success"> <i class="fas fa-lightbulb"></i> Active</span>'
            : '<span class="badge badge-warning"> <i class="far fa-lightbulb"></i> Un Active</span>';
    }
}
