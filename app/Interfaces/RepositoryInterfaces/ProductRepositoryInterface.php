<?php

namespace App\Interfaces\RepositoryInterfaces;

use App\Interfaces\BaseResourceRepositoryInterface;

interface ProductRepositoryInterface extends BaseResourceRepositoryInterface
{
    public function filter(array $data);
}
