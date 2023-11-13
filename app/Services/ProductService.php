<?php

namespace App\Services;

use App\Abstracts\AbstractBaseResourceService;
use App\Abstracts\AbstractMediaBaseResourceService;
use App\Interfaces\RepositoryInterfaces\ProductRepositoryInterface;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;

class ProductService extends AbstractMediaBaseResourceService implements ProductServiceInterface
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
