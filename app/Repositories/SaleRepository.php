<?php

namespace App\Repositories;

use App\Interfaces\SaleRepositoryInterface;
use App\Models\Sale;

class SaleRepository implements SaleRepositoryInterface
{

    public function getSaleHistoryByProductId($id)
    {
        return Sale::where('product_id','=',$id);
    }

    public function create(array $data)
    {
        return Sale::create($data);
    }
}
