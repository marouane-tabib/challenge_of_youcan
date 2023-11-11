<?php

namespace App\Abstracts;

use App\Interfaces\BaseResourceRepositoryInterface;
use App\Interfaces\BaseResourceServiceInterface;

abstract class AbstractBaseResourceService implements BaseResourceServiceInterface
{
    protected BaseResourceRepositoryInterface $repository;

    public function __construct(BaseResourceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(array $data = [])
    {
        return $this->repository->filter($data);
    }
}
