<?php

namespace App\Abstracts;

use App\Interfaces\BaseResourceRepositoryInterface;
use App\Interfaces\BaseResourceServiceInterface;

abstract class AbstractBaseResourceService implements BaseResourceServiceInterface
{
    protected $repository;

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
        return $this->repository->create($data);
    }
}
