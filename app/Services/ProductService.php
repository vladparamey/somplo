<?php

namespace App\Services;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Services\ProductServiceInterface;
use App\Models\Product;
use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ProductService implements ProductServiceInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private ProductRepositoryInterface $productRepository;

    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param array $data
     * @return Product
     */
    public function setData(array $data): Product
    {
        return $this->productRepository->setData($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateDataBulk(array $data): bool
    {
        return $this->productRepository->updateDataBulk($data);
    }

    /**
     * @param int $sellerId
     * @return Collection
     */
    public function getSellersData(int $sellerId): Collection
    {
        return $this->productRepository->getSellersData($sellerId);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function bulkInsert(array $data): bool
    {
        $dataWithTimestamps = $this->addTimestamps($data);

        return $this->productRepository->bulkInsert($dataWithTimestamps);
    }

    /**
     * @param array $data
     * @return array
     */
    private function addTimestamps(array $data): array
    {
        $timestamp = Carbon::now();

        foreach ($data as &$item) {
            $item['created_at'] = $timestamp;
            $item['updated_at'] = $timestamp;
        }

        return $data;
    }
}
