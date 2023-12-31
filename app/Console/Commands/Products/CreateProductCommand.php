<?php

namespace App\Console\Commands\Products;

use App\Interfaces\ServiceInterfaces\CategoryServiceInterface;
use App\Interfaces\ServiceInterfaces\ProductServiceInterface;
use App\Traits\CliValidator;
use Illuminate\Console\Command;

class CreateProductCommand extends Command
{
    use CliValidator;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create
                            {name? : Add product name.          [string|min:3|max:55]}
                            {description? : Add product description.   [string|min:10]}
                            {price? : Add product price.         [numeric|min:1]}
                            {category_id? : Add product category_id.   [numeric]}
                            {--a|ask=true : Do not show any ask message }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(
        ProductServiceInterface $productService,
        CategoryServiceInterface $categoryService
    ): void {
        try {
            $categories = $categoryService->index(['id', 'name']);

            if ('true' === $this->option('ask')) {
                foreach ($this->arguments() as $key => $argument) {
                    if ('category_id' === $key) {
                        $this->argument('category_id') ?? $this->info('Show All Categories.');
                        $this->argument('category_id') ?? $this->table(['id', 'name'], $categories);
                    }
                    $data[$key] = $this->argument($key) ?: $this->ask('Add Your Product '.$key);
                }
            } else {
                $data = $this->arguments();
            }

            $productService->create($data);
            // Create Message
            $this->info('Product created successfully!');
        } catch (\InvalidArgumentException $e) {
            $this->error($e->getMessage());
        } catch (\Exception $e) {
            $this->error('Exception: '.$e->getMessage());
        }
    }
}
