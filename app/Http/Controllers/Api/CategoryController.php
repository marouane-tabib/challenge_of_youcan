<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ServiceInterfaces\CategoryServiceInterface;

class CategoryController extends Controller
{
    protected CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        try {
            $categories = $this->categoryService->all(['id', 'name']);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return response()->json(['exception' => $e->getMessage()]);
        }

        return response()->json($categories, 200);
    }
}
