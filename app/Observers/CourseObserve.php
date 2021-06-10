<?php

namespace App\Observers;

use App\Traits\UploadFile;
use App\Models\Course;

class CourseObserve
{
    use UploadFile;

    public function created(Course $course)
    {
        $this->upload($course);
        $course->saveQuietly();
    }

    public function updated(Course $course)
    {
        $this->upload($course);
        $course->saveQuietly();
    }

    public function deleted(Course $course)
    {
        $this->remove($course->image, 'courses');
    }

    protected function upload($course)
    {
        $src = explode('/', $course->image);
        if (in_array('tmp', $src) || in_array('temp', $src))
            $course->image = $this->uploadImage($course->image, 'courses');
    }
}
