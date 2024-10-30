<?php

namespace App\Repositories;

use App\Contracts\Repositories\SellerRepositoryInterface;
use App\Models\Seller;

class SellerRepository implements SellerRepositoryInterface
{
    public function setData(string $sellerName): Seller
    {
        return Seller::create([
            'seller_name' => $sellerName,
        ]);
    }
}
