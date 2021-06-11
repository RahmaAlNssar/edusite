<?php

namespace App\Observers;

use App\Models\Post;
use App\Traits\UploadFile;
class PostObserve
{
    use UploadFile;
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $this->uploadImage($post);
        $post->saveQuietly();
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        $this->remove($post->image, 'posts');
    }

    protected function uploadImage($post)
    {
        $src = explode('/', $post->image);
        if (in_array('tmp', $src) || in_array('temp', $src)) {
            $post->image = $this->upload($post->image, 'posts');
        }
    }
}
