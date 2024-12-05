<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitProductTest extends TestCase
{
    use RefreshDatabase;

    protected $productRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->productRepository = new ProductRepository();
    }

    public function test_get_all_tasks()
    {
        Product::factory()->count(3)->create();
        $products = $this->productRepository->getAll();
        $this->assertCount(3, $products);
    }

    public function test_create_task()
    {
        $data = ['name' => 'Test Task'];
        $product = $this->productRepository->create($data);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('Test Task', $product->name);
    }

    public function test_find_task()
    {
        $product = Product::factory()->create();
        $foundTask = $this->productRepository->find($product->id);
        $this->assertNotNull($foundTask);
        $this->assertEquals($product->id, $foundTask->id);
    }

    public function test_update_task()
    {
        $product = Product::factory()->create();
        $data = ['name' => 'Updated Product'];
        $updatedTask = $this->productRepository->update($product->id, $data);
        $this->assertNotNull($updatedTask);
        $this->assertEquals('Updated Product', $updatedTask->name);
    }

    public function test_delete_task()
    {
        $product = Product::factory()->create();
        $result = $this->productRepository->delete($product->id);
        $this->assertTrue($result);
        $this->assertNull(Product::find($product->id));
    }
}
