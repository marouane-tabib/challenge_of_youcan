<?php

namespace App\Services;

use App\Abstracts\AbstractBaseResourceService;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;
use App\Repositories\ProductRepository;

class ProductService extends AbstractBaseResourceService implements ProductServiceInterface
{
    protected ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data = [])
    {
        return $this->repository->create($data);
    }
}
