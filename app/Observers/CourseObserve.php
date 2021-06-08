<?php

namespace App\Observers;

use App\Traits\UploadFile;
use App\Models\Course;

class CourseObserve
{
    use UploadFile;

    public function created(Course $course)
    {
        if ($course->discount == null || $course->discount == 0) {
            $course->discount   = null;
            $course->start_date = null;
            $course->end_date   = null;
        }
        $this->uploadImage($course);
        $course->saveQuietly();
    }

    public function updated(Course $course)
    {
        if ($course->discount == null || $course->discount == 0) {
            $course->discount   = null;
            $course->start_date = null;
            $course->end_date   = null;
        }
        $this->uploadImage($course);
        $course->saveQuietly();
    }

    public function deleted(Course $course)
    {
        $this->remove($course->image, 'courses');
    }

    protected function uploadImage($course)
    {
        $src = explode('/', $course->image);
        if (in_array('tmp', $src) || in_array('temp', $src)) {
            $course->image = $this->upload($course->image, 'courses');
        }
    }
}
