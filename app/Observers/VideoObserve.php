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
        if ($video->type == 'file')
            $this->remove($video->file, 'videos');
    }

    protected function upload($video)
    {
        $src = explode('/', $video->file);
        if (in_array('tmp', $src) || in_array('temp', $src)) {
            $video->file = $this->uploadVideo($video->file, 'videos');
            $video->saveQuietly();
        }
    }
}
