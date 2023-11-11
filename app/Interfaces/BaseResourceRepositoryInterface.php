<?php

namespace App\Interfaces;

interface BaseResourceRepositoryInterface
{
    public function all();

    public function filter(array $data);
}
