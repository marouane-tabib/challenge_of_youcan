<?php

namespace App\Services;

use App\Abstracts\AbstractBaseResourceService;
use App\Interfaces\ServiceInterfaces\CategoryServiceInterface;

class CategoryService extends AbstractBaseResourceService implements CategoryServiceInterface
{
    protected $repository;

    public function __construct(CategoryServiceInterface $repository)
    {
        $this->repository = $repository;
    }
}
