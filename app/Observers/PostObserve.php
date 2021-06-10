<?php

namespace App\Observers;

use App\Models\Post;
use App\Traits\UploadFile;

class PostObserve
{
    use UploadFile;

    public function created(Post $post)
    {
        $this->upload($post);
    }

    public function updated(Post $post)
    {
        $this->upload($post);
    }

    public function deleted(Post $post)
    {
        $this->remove($post->image, 'posts');
    }

    protected function upload($post)
    {
        $src = explode('/', $post->image);
        if (in_array('tmp', $src) || in_array('temp', $src))
            $post->image = $this->uploadImage($post->image, 'posts');
        $post->saveQuietly();
    }
}
