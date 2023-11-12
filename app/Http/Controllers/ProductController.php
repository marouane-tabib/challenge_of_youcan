<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
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
    public function index(ProductRequest $request)
    {
        return view(
            'products.index',
            [
                'products' => $this->productService->index($request->validated()),
                'categories' => [],
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}
}
