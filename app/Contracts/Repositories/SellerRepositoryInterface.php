<?php

namespace App\Contracts\Repositories;

use App\Models\Seller;

interface SellerRepositoryInterface
{
    public function setData(string $sellerName): Seller;
}
