<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Page extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

      /*************************** Begin ATTRIBUTES Area ****************************/
      public function sluggable(): array
      {
          return ['slug' => ['source' => 'name', 'onUpdate' => true,]];
      } 

       /*************************** End ATTRIBUTES Area ****************************/
}
