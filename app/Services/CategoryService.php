<?php

namespace App\Services;

use App\Abstracts\AbstractBaseResourceService;
use App\Interfaces\RepositoryInterfaces\ProductRepositoryInterface;
use App\Interfaces\ServiceInterfaces\CategoryServiceInterface;

class CategoryService extends AbstractBaseResourceService implements CategoryServiceInterface
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
