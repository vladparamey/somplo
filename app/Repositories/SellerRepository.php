<?php

namespace App\Repositories;

use App\Contracts\Repositories\SellerRepositoryInterface;
use App\Models\Seller;

class SellerRepository implements SellerRepositoryInterface
{
    /**
     * @param string $sellerName
     * @return Seller
     */
    public function setData(string $sellerName): Seller
    {
        return Seller::create([
            'seller_name' => $sellerName
        ]);
    }
}
