<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait UploadFile
{
    public function upload($file, $folder)
    {
        $src = explode('/', $file);

        if (in_array('tmp', $src) || in_array('temp', $src)) {
            $name = $file->hashName();
            $file->move(public_path() . '/uploads/' . $folder . '/', $name);
            return $name;
        }
    }

    public function remove($file, $folder)
    {
        $path = public_path('uploads/' . $folder . '/' . $file);
        if (File::exists($path))
            unlink($path);
    }
}
