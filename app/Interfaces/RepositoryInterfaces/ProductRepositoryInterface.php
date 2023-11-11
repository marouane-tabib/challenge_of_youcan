<?php

namespace App\Interfaces\RepositoryInterfaces;

use App\Interfaces\BaseResourceRepositoryInterface;

interface ProductRepositoryInterface extends BaseResourceRepositoryInterface
{
    public function create(array $data);

    public function filter(array $filter);
}
