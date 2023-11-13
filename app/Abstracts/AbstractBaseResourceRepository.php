<?php

namespace App\Abstracts;

use App\Interfaces\BaseResourceRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractBaseResourceRepository implements BaseResourceRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $select = ['*'])
    {
        return $this->model->all($select);
    }

    public function create(array $data = [])
    {
        return $this->model->create($data);
    }
}
