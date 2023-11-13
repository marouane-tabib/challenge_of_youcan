<?php

namespace App\Interfaces;

interface BaseResourceServiceInterface
{
    public function index(array $select);

    public function create(array $data);
}
