<?php

namespace App\Services;

use App\Contracts\Repositories\SellerRepositoryInterface;
use App\Contracts\Services\SellerServiceInterface;
use App\Models\Seller;

class SellerService implements SellerServiceInterface
{
    private SellerRepositoryInterface $sellerRepository;

    public function __construct(
        SellerRepositoryInterface $sellerRepository
    ) {
        $this->sellerRepository = $sellerRepository;
    }

    public function setData(string $sellerName): Seller
    {
        return $this->sellerRepository->setData($sellerName);
    }
}
