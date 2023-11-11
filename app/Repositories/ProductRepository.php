<?php

namespace App\Repositories;

use App\Abstracts\AbstractBaseResourceRepository;
use App\Interfaces\RepositoryInterfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends AbstractBaseResourceRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function filter(array $data) {}

    public function create(array $data) {}
}
