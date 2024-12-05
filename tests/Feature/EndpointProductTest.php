<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class EndpointProductTest extends TestCase
{

    public function test_get_all_products()
    {

        $this->withoutMiddleware();

        // Crear algunas tareas de prueba
        Product::factory()->count(3)->create();

        $response = $this->get('/api/products');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => [
                         'id',
                         'name',
                     ]
                 ]);
    }

    /**
     * Prueba para crear una tarea.
     */
    public function test_create_product()
    {
        $this->withoutMiddleware();
        
        $data = [
            'name' => 'Nueva tarea de prueba'
        ];

        $response = $this->post('/api/products', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment($data);
    }

    /**
     * Prueba para obtener una tarea por ID.
     */
    public function test_get_product_by_id()
    {
        $this->withoutMiddleware();

        $product = Product::factory()->create();

        $response = $this->get("/api/products/{$product->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $product->id,
                     'name' => $product->name,
                 ]);
    }
    /**
     * Prueba para actualizar una tarea.
     */
    public function test_update_product()
    {
        $this->withoutMiddleware();

        $this->withoutMiddleware();

        $product = Product::factory()->create();

        $data = [
            'name' => 'Producto actualizado'
        ];

        $response = $this->put("/api/products/{$product->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment($data);
    }
    /**
     * Prueba para eliminar una tarea.
     */
    public function test_delete_product()
    {
        $this->withoutMiddleware();

        $product = Product::factory()->create();

        $response = $this->delete("/api/products/{$product->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Product deleted'
                 ]);
    }
}
