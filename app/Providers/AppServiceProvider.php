<?php

namespace App\Providers;

use App\Interfaces\ServiceInterfaces\CategoryServiceInterface;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;
use App\Interfaces\ValidationServiceInterfaces\ProductValidationServiceInterface;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\ValidationServices\ProductValidationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductValidationServiceInterface::class, ProductValidationService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
