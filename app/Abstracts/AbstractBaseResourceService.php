<?php

namespace App\Abstracts;

use App\Interfaces\BaseResourceRepositoryInterface;
use App\Interfaces\BaseResourceServiceInterface;
use App\Interfaces\BaseValidationServiceInterface;
use App\Traits\ImageUploaderTrait;

abstract class AbstractBaseResourceService implements BaseResourceServiceInterface
{
    use ImageUploaderTrait;

    protected $repository;
    protected $validator;
    protected string $storagepath = 'storage/media';
    protected string $fileName = 'file';

    public function __construct(
        BaseResourceRepositoryInterface $repository,
        BaseValidationServiceInterface $validator
    ) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index(array $select = ['*'])
    {
        return $this->repository->all($select);
    }

    public function create(array $data = [])
    {
        $data = $this->validator->storeValidation($data);
        if (isset($data[$this->fileName])) {
            $data[$this->fileName] = $this->uploadFile($this->storagepath, $data[$this->fileName]);
        }

        return $this->repository->create($data);
    }
}
