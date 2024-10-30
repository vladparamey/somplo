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
    /**
     * @var ProductServiceInterface $productService
     */
    private ProductServiceInterface $productService;

    /**
     * @param ProductServiceInterface $productService
     */
    public function __construct(
        ProductServiceInterface $productService
    )
    {
        $this->productService = $productService;
    }

    /**
     * @param ProductSetDataRequest $request
     * @return JsonResponse
     */
    public function setData(ProductSetDataRequest $request): JsonResponse
    {
        $data = $request->validated();

        $product = $this->productService->setData($data);

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @param ProductUpdateDataBulkRequest $request
     * @return JsonResponse
     */
    public function updateDataBulk(ProductUpdateDataBulkRequest $request): JsonResponse
    {
        $data = $request->validated();

        $this->productService->updateDataBulk($data);

        return response()->json([], Response::HTTP_OK);
    }

    /**
     * @param ProductGetDataRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function getData(int $id, ProductGetDataRequest $request): JsonResponse
    {
        $data = $this->productService->getSellersData($id);

        return ProductCollection::collection($data)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param ProductBulkInsertRequest $request
     * @return JsonResponse
     */
    public function bulkInsert(ProductBulkInsertRequest $request): JsonResponse
    {
        $data = $request->dataValidated();

        $this->productService->bulkInsert($data);

        return response()->json([], Response::HTTP_CREATED);
    }
}
