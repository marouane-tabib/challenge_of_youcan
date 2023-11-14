<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class RouteTest extends TestCase
{
    public function testShopProductsPage()
    {
        $response = $this->get('/products');
        $response->assertViewIs('products.index');
        $response->assertOk();
    }

    public function testPostRequestOnProductsPage()
    {
        $response = $this->post('/products', [
            'name' => 'Testing fake name',
            'description' => 'Testing fake description...',
            'price' => 443,
            'category_id' => 4,
        ]);
        $response->assertRedirect('/products');
    }
}
