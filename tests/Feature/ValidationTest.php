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
        $response->withViewErrors('name');
        $response->withViewErrors('description');
        $response->withViewErrors('price');
        $response->withViewErrors('category_id');
    }
}
