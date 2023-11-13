<?php

namespace App\Traits;

trait ImageUploaderTrait
{
    public function uploadFile(string $storagepath, $file)
    {
        if ($file) {
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path($storagepath), $filename);
            return $filename;
        } else  return null;
    }
}
