<?php

namespace App\Observers;

use App\Models\SliderImage;
use App\Traits\UploadFile;
class SliderImageObserve
{
    use UploadFile;
    /**
     * Handle the SliderImage "created" event.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return void
     */
    public function created(SliderImage $sliderImage)
    {
        $this->uploadImage($sliderImage);
        $sliderImage->saveQuietly();
    }

    public function deleted(SliderImage $sliderImage)
    {
        $this->remove($sliderImage->image, 'sliders');
    }

    protected function uploadImage($sliderImage)
    {
        $src = explode('/', $sliderImage->image);
        if (in_array('tmp', $src) || in_array('temp', $src)) {
            $sliderImage->image = $this->upload($sliderImage->image, 'sliders');
        }
    }

}
