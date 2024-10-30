<?php

namespace App\Services;

use App\Contracts\Repositories\SellerRepositoryInterface;
use App\Contracts\Services\SellerServiceInterface;
use App\Models\Seller;

class SellerService implements SellerServiceInterface
{
    /**
     * @var SellerRepositoryInterface
     */
    private SellerRepositoryInterface $sellerRepository;

    /**
     * @param SellerRepositoryInterface $sellerRepository
     */
    public function __construct(
        SellerRepositoryInterface $sellerRepository
    )
    {
        $this->sellerRepository = $sellerRepository;
    }

    /**
     * @param string $sellerName
     * @return Seller
     */
    public function setData(string $sellerName): Seller
    {
        return $this->sellerRepository->setData($sellerName);
    }
}
