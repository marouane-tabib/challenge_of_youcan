<?php

namespace App\Abstracts;

use App\Interfaces\BaseResourceServiceInterface;
use App\Traits\ImageUploaderTrait;

abstract class AbstractMediaBaseResourceService extends AbstractBaseResourceService implements BaseResourceServiceInterface
{
    use ImageUploaderTrait {
        uploadFile as fileUploader;
    }

    protected string $storagepath = 'storage/media';
    protected string $fileName = 'file';

    public function create(array $data = [])
    {
        $data[$this->fileName] = $this->uploadFile($data[$this->fileName]);
        return parent::create($data);
    }

    public function uploadFile($file)
    {
        return $this->fileUploader($this->storagepath, $file);
    }
}
