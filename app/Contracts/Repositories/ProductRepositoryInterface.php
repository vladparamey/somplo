<?php

namespace App\Contracts\Repositories;

use App\Models\Product;
use App\Models\Seller;
use App\Repositories\ProductRepository;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    /**
     * @param array $data
     * @return Product
     */
    public function setData(array $data): Product;

    /**
     * @param array $data
     * @return bool
     */
    public function updateDataBulk(array $data): bool;

    /**
     * @param int $sellerId
     * @return Collection
     */
    public function getSellersData(int $sellerId): Collection;

    /**
     * @param array $data
     * @return bool
     */
    public function bulkInsert(array $data): bool;
}