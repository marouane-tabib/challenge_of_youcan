<?php

namespace App\Interfaces;

interface BaseResourceRepositoryInterface
{
    public function all(array $select);

    public function create(array $data);
}
