<?php

namespace App\Interfaces;

interface SaleRepositoryInterface
{
    public function getSaleHistoryByProductId($id);
    public function create(array $data);

}
