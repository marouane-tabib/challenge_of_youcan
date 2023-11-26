<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function store(Request $request)
    {
        try {
            $this->productService->create($request->all());
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return response()->json(['exception' => $e->getMessage()]);
        }

        return response()->json(["message" => "Product Created!"], 200);
    }
}
