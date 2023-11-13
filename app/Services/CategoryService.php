<?php

namespace App\Services;

use App\Abstracts\AbstractBaseResourceService;
use App\Interfaces\RepositoryInterfaces\CategoryRepositoryInterface;
use App\Interfaces\ServiceInterfaces\CategoryServiceInterface;

class CategoryService extends AbstractBaseResourceService implements CategoryServiceInterface
{
    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
