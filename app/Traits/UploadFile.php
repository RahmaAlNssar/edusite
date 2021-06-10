<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

trait UploadFile
{
    public function uploadVideo($file, $folder)
    {
        $name = $file->hashName();
        $file->move(public_path() . '/uploads/' . $folder . '/', $name);
        return $name;
    }

    public function uploadImage($file, $folder)
    {
        image::make($file)
            ->resize(360, 229, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/' . $folder . '/' . $file->hashName()), 60);
        return $file->hashName();
    }

    public function remove($file, $folder)
    {
        $path = public_path('uploads/' . $folder . '/' . $file);
        if (File::exists($path))
            unlink($path);
    }
}
