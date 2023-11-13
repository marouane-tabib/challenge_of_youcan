<?php

namespace App\Repositories;

use App\Abstracts\AbstractBaseResourceRepository;
use App\Interfaces\RepositoryInterfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends AbstractBaseResourceRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
