<?php

namespace App\Observers;

use App\Traits\UploadFile;
use App\Models\Video;

class VideoObserve
{
    use UploadFile;

    public function created(Video $video)
    {
        $this->uploadVideo($video);
    }

    public function updated(Video $video)
    {
        $this->uploadVideo($video);
    }

    public function deleted(Video $video)
    {
        $this->remove($video->video, 'videos');
    }

    protected function uploadVideo($video)
    {
        $video->type  =  'video/' . $video->video->getClientOriginalExtension();
        $video->video = $this->upload($video->video, 'videos');
        $video->saveQuietly();
    }
}
