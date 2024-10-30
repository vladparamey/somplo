<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @param array $data
     * @return Product
     */
    public function setData(array $data): Product
    {
        return Product::create($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateDataBulk(array $data): bool
    {
        return Product::whereIn('id', $data['ids'])
            ->update([
                'cost' => $data['cost']
            ]);
    }

    /**
     * @param int $sellerId
     * @return Collection
     */
    public function getSellersData(int $sellerId): Collection
    {
        return Product::where('seller_id', $sellerId)
            ->where('display_size', '>', 5)
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->select('sellers.seller_name', 'products.phone_name')
            ->get();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function bulkInsert(array $data): bool
    {
        return Product::insert($data);
    }
}
