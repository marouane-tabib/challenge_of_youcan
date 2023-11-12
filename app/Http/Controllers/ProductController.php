<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param App\Http\Requests\ProductRequest $request
     */
    public function index(ProductRequest $request) {}

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}
}
