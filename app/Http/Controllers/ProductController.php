<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Interfaces\ServiceInterfaces\CategoryServiceInterface;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;

class ProductController extends Controller
{
    protected ProductServiceInterface $productService;
    protected CategoryServiceInterface $categoryService;

    public function __construct(
        ProductServiceInterface $productService,
        CategoryServiceInterface $categoryService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param App\Http\Requests\ProductRequest $request
     */
    public function index(ProductRequest $request)
    {
        return view(
            'products.index',
            [
                'products' => $this->productService->filter($request->all()),
                'categories' => $this->categoryService->index(['*']),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProductRequest $request)
    {
        $this->productService->create($request->all());

        return redirect()->route('products.index');
    }
}
