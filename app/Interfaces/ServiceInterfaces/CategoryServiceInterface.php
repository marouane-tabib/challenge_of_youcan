<?php

namespace App\Interfaces\ServiceInterfaces;

use App\Interfaces\BaseResourceServiceInterface;

interface CategoryServiceInterface extends BaseResourceServiceInterface
{
    public function all(array $select);
}
