<?php

namespace App\Services;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Services\ProductServiceInterface;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ProductService implements ProductServiceInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function setData(array $data): Product
    {
        return $this->productRepository->setData($data);
    }

    public function updateDataBulk(array $data): bool
    {
        return $this->productRepository->updateDataBulk($data);
    }

    public function getSellersData(int $sellerId): Collection
    {
        return $this->productRepository->getSellersData($sellerId);
    }

    public function bulkInsert(array $data): bool
    {
        $dataWithTimestamps = $this->addTimestamps($data);

        return $this->productRepository->bulkInsert($dataWithTimestamps);
    }

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
