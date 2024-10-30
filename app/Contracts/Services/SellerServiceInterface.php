<?php

namespace App\Contracts\Services;

use App\Models\Seller;

interface SellerServiceInterface
{
    public function setData(string $sellerName): Seller;
}
