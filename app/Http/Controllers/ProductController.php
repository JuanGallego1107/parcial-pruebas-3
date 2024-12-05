<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return response()->json($this->productRepository->getAll(), 200);
    }

    public function store(Request $request)
    {
        $task = $this->productRepository->create($request->all());
        return response()->json($task, 200);
    }

    public function show($id)
    {
        $task = $this->productRepository->find($id);
        if ($task) {
            return response()->json($task, 200);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $task = $this->productRepository->update($id, $request->all());
        if ($task) {
            return response()->json($task, 200);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }

    public function destroy($id)
    {
        if ($this->productRepository->delete($id)) {
            return response()->json(['message' => 'Product deleted'], 200);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }
}
