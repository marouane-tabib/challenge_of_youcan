<?php

namespace App\Interfaces;

interface BaseResourceRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function filter(array $filter);
}
