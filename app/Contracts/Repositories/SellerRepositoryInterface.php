<?php

namespace App\Contracts\Repositories;

use App\Models\Seller;

interface SellerRepositoryInterface
{
    /**
     * @param string $sellerName
     * @return Seller
     */
    public function setData(string $sellerName): Seller;
}
