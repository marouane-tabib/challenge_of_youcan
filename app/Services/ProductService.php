<?php

namespace App\Services;

use App\Abstracts\AbstractBaseResourceService;
use App\Interfaces\RepositoryInterfaces\ProductRepositoryInterface;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;

class ProductService extends AbstractBaseResourceService implements ProductServiceInterface
{
    protected $repository;
    protected string $storagepath = 'storage/media/images/products';
    protected string $fileName = 'image';

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function filter(array $data)
    {
        return $this->repository->filter($data);
    }
}
