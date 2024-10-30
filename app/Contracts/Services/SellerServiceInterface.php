<?php

namespace App\Contracts\Services;

use App\Models\Seller;

interface SellerServiceInterface
{
    /**
     * @param string $sellerName
     * @return Seller
     */
    public function setData(string $sellerName): Seller;
}
