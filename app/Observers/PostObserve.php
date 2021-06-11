<?php

namespace App\Observers;

use App\Models\Post;
use App\Traits\UploadFile;

class PostObserve
{
    use UploadFile;

    public function created(Post $post)
    {
<<<<<<< HEAD
        $this->uploadImage($post);
        $post->saveQuietly();
=======
        $this->upload($post);
    }

    public function updated(Post $post)
    {
        $this->upload($post);
>>>>>>> a6af0ae86812d34c9b9650e61a63e1c53fc2a9e8
    }

    public function deleted(Post $post)
    {
        $this->remove($post->image, 'posts');
    }

    protected function upload($post)
    {
        $src = explode('/', $post->image);
<<<<<<< HEAD
        if (in_array('tmp', $src) || in_array('temp', $src)) {
            $post->image = $this->upload($post->image, 'posts');
        }
=======
        if (in_array('tmp', $src) || in_array('temp', $src))
            $post->image = $this->uploadImage($post->image, 'posts');
        $post->saveQuietly();
>>>>>>> a6af0ae86812d34c9b9650e61a63e1c53fc2a9e8
    }
}
