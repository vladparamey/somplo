<?php

namespace App\Contracts\Services;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductServiceInterface
{
    public function setData(array $data): Product;

    public function updateDataBulk(array $data): bool;

    public function getSellersData(int $sellerId): Collection;

    public function bulkInsert(array $data): bool;
}
