<?php

namespace App\Abstracts;

use App\Interfaces\BaseResourceRepositoryInterface;
use App\Interfaces\BaseResourceServiceInterface;
use App\Traits\ImageUploaderTrait;

abstract class AbstractBaseResourceService implements BaseResourceServiceInterface
{
    use ImageUploaderTrait;
    protected $repository;
    protected string $storagepath = 'storage/media';
    protected string $fileName = 'file';

    public function __construct(BaseResourceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(array $select = ['*'])
    {
        return $this->repository->all($select);
    }

    public function create(array $data = [])
    {
        if (isset($data[$this->fileName])) {
            $data[$this->fileName] = $this->uploadFile($this->storagepath, $data[$this->fileName]);
        }

        return $this->repository->create($data);
    }
}
