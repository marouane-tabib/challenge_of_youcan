<?php

namespace App\Repositories;

use App\Abstracts\AbstractBaseResourceRepository;
use App\Interfaces\RepositoryInterfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository extends AbstractBaseResourceRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function filter(array $data)
    {
        return $this->model::when(isset($data['category_filter']) && $data['category_filter'] != '',
            function ($query) use ($data) {
                $query->where('category_id', $data['category_filter']);
            })
            ->orderBy($data['sort_by'] ?? 'id', $data['order_by'] ?? 'desc')
            ->get()
        ;
    }
}
