<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Product;

/**
 * Command Artisan: php artisan make:test ProductsTest
 * For to execute this test use command: "vendor/bin/phpunit"
 */
class ProductsTest extends TestCase
{
    // Quando adicionamos "RefreshDatabase" irá executar as migrations criando assim DB
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        factory(Product::class)->create();
        $data = \DB::table('products')->first();
        // $response = $this->get('/');
        // $this->assertDatabaseMissing('products', (array) $data); // quando um registro não pode existir no DB
        // $this->assertSoftDeleted('products', (array) $data); // para saber se foi removido logicamente
        $this->assertDatabaseHas('products', (array) $data);
    }
}
