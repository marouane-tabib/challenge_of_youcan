<?php

namespace App\Interfaces\ServiceInterfaces;

use App\Interfaces\BaseResourceServiceInterface;

interface ProductServiceInterface extends BaseResourceServiceInterface
{
    public function filter(array $data);

    public function create(array $data);
}
