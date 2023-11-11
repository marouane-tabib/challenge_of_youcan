<?php

namespace App\Abstracts;

use App\Interfaces\BaseResourceRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractBaseResourceRepository implements BaseResourceRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }
}
