<?php

namespace App\Services;

use App\Abstracts\AbstractBaseResourceService;
use App\Interfaces\RepositoryInterfaces\ProductRepositoryInterface;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;

class ProductService extends AbstractBaseResourceService implements ProductServiceInterface
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function filter(array $data)
    {
        return $this->repository->filter($data);
    }

    public function create(array $data = [])
    {
        return $this->repository->create($data);
    }
}
