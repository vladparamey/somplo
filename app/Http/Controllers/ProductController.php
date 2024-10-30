<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ProductServiceInterface;
use App\Http\Requests\ProductBulkInsertRequest;
use App\Http\Requests\ProductGetDataRequest;
use App\Http\Requests\ProductSetDataRequest;
use App\Http\Requests\ProductUpdateDataBulkRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    private ProductServiceInterface $productService;

    public function __construct(
        ProductServiceInterface $productService
    ) {
        $this->productService = $productService;
    }

    public function setData(ProductSetDataRequest $request): JsonResponse
    {
        $data = $request->validated();

        $product = $this->productService->setData($data);

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function updateDataBulk(ProductUpdateDataBulkRequest $request): JsonResponse
    {
        $data = $request->validated();

        $this->productService->updateDataBulk($data);

        return response()->json([], Response::HTTP_OK);
    }

    public function getData(int $id, ProductGetDataRequest $request): JsonResponse
    {
        $data = $this->productService->getSellersData($id);

        return ProductCollection::collection($data)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function bulkInsert(ProductBulkInsertRequest $request): JsonResponse
    {
        $data = $request->dataValidated();

        $this->productService->bulkInsert($data);

        return response()->json([], Response::HTTP_CREATED);
    }
}
