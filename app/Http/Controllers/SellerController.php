<?php

namespace App\Http\Controllers;

use App\Contracts\Services\SellerServiceInterface;
use App\Http\Requests\SellerSetDataRequest;
use App\Http\Resources\SellerResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SellerController extends Controller
{
    /**
     * @var SellerServiceInterface $sellerService
     */
    private SellerServiceInterface $sellerService;

    /**
     * @param SellerServiceInterface $sellerService
     */
    public function __construct(
        SellerServiceInterface $sellerService
    )
    {
        $this->sellerService = $sellerService;
    }

    /**
     * @param SellerSetDataRequest $request
     * @return JsonResponse
     */
    public function setData(SellerSetDataRequest $request): JsonResponse
    {
        $data = $request->validated();

        $seller = $this->sellerService->setData($data['seller_name']);

        return (new SellerResource($seller))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
