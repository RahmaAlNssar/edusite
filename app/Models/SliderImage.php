<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class SliderImage extends Model
{
    use HasFactory;

    protected $fillable = ['title','descrption','image','visibility','page_id'];


    /*************************** Begin ATTRIBUTES Area ****************************/
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title', 'onUpdate' => true,]];
    } 

     /*************************** End ATTRIBUTES Area ****************************/

     
    /*************************** Begin RELATIONS Area ****************************/

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id');
    }


    
    /*************************** End RELATIONS Area ****************************/

    /*************************** Begin ATTRIBUTES Area ****************************/
    public function getImageUrlAttribute()
    {
        return asset('uploads/sliders/' . $this->image);
    } // return image path

    public function visibilityType()
    {
        return $this->visibility == 1
            ? '<a href="' . route('backend.categories.visibility-toggle', $this->id) . '" class="btn btn-success btn-sm visibility-toggle"> <i class="fas fa-lightbulb"></i>&nbsp; Visible</a>'
            : '<a href="' . route('backend.categories.visibility-toggle', $this->id) . '" class="btn btn-warning btn-sm visibility-toggle"> <i class="far fa-lightbulb"></i>&nbsp; Hidden</a>';
    }
}
