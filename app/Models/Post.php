<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    use HasFactory;
  

        protected $fillable=['title','descrption','image','visibility','user_id','category_id'];

 /*************************** Begin RELATIONS Area ****************************/
        public function tags()
        {
            return $this->morphToMany(Tag::class, 'taggable');
        }

        public function user(){
            return $this->belongsTo(User::class,'user_id');
        }

        public function category(){
            return $this->belongsTo(Category::class,'category_id');
        }
    /*************************** Begin SCOPE Area *********************************/
    public function getImageUrlAttribute()
    {
        return asset('uploads/posts/' . $this->image);
    } // return image path


    /*************************** Begin ATTRIBUTES Area ****************************/

    public function visibilityType()
    {
        return $this->visibility == 1
            ? '<a href="' . route('backend.categories.visibility-toggle', $this->id) . '" class="btn btn-success btn-sm visibility-toggle"> <i class="fas fa-lightbulb"></i>&nbsp; Visible</a>'
            : '<a href="' . route('backend.categories.visibility-toggle', $this->id) . '" class="btn btn-warning btn-sm visibility-toggle"> <i class="far fa-lightbulb"></i>&nbsp; Hidden</a>';
    }





    /*************************** END ATTRIBUTES Area ****************************/
}
