<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class ValidationTest extends TestCase
{
    public function testSimpleValidationRules()
    {
        $response = $this->post('/products');
        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('description');
        $response->assertSessionHasErrors('price');
        $response->assertSessionHasErrors('category_id');
    }
}
