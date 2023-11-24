<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Interfaces\ServiceInterfaces\CategoryServiceInterface;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;

class ProductController extends Controller
{
    protected ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param App\Http\Requests\ProductRequest $request
     */
    public function index(
        FilterProductRequest $request,
        CategoryServiceInterface $categoryService
    ) {
        return view(
            'products.index',
            [
                'products' => $this->productService->filter($request->all()),
                'categories' => $categoryService->all(['id', 'name']),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreProductRequest $request)
    {
        $this->productService->create($request->validated());

        return redirect()->route('products.index');
    }
}
