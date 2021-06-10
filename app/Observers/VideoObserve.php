<?php

namespace App\Observers;

use App\Traits\UploadFile;
use App\Models\Video;

class VideoObserve
{
    use UploadFile;

    public function created(Video $video)
    {
        $this->upload($video);
    }

    public function updated(Video $video)
    {
        $this->upload($video);
    }

    public function deleted(Video $video)
    {
        $this->remove($video->video, 'videos');
    }

    protected function upload($video)
    {
        $src = explode('/', $video->video);
        if (in_array('tmp', $src) || in_array('temp', $src)) {
            $video->type  =  'video/' . $video->video->getClientOriginalExtension();
            $video->video = $this->uploadVideo($video->video, 'videos');
            $video->saveQuietly();
        }
    }
}
