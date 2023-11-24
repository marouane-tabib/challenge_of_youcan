<?php

namespace App\Http\Controllers;

use App\Interfaces\ServiceInterfaces\CategoryServiceInterface;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;
use Illuminate\Http\Request;

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
    public function index(Request $request, CategoryServiceInterface $categoryService)
    {
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
    public function create(Request $request)
    {
        $this->productService->create($request->all());

        return redirect()->route('products.index');
    }
}
