<?php

namespace App\Services;

use App\Abstracts\AbstractBaseResourceService;
use App\Interfaces\RepositoryInterfaces\ProductRepositoryInterface;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;
use App\Interfaces\ValidationServiceInterfaces\ProductValidationServiceInterface;

class ProductService extends AbstractBaseResourceService implements ProductServiceInterface
{
    protected $validator;
    protected $repository;
    protected string $storagepath = 'storage/media/images/products';
    protected string $fileName = 'image';

    public function __construct(
        ProductRepositoryInterface $repository,
        ProductValidationServiceInterface $validator
    ) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function filter(array $data)
    {
        $data = $this->validator->filterValidation($data);

        return $this->repository->filter($data);
    }
}
