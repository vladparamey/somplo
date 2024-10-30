<?php

namespace App\Http\Controllers;

use App\Contracts\Parser\UtilityServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UtilityController extends Controller
{
    /**
     * @var UtilityServiceInterface $utilityService
     */
    private UtilityServiceInterface $utilityService;

    /**
     * @param UtilityServiceInterface $utilityService
     */
    public function __construct(UtilityServiceInterface $utilityService)
    {
        $this->utilityService = $utilityService;
    }

    /**
     * @return JsonResponse
     */
    public function parse(): JsonResponse
    {
        $url = config('services.rozetka.promo_url');

        $images = $this->utilityService->fetchPromoImages($url);

        return response()->json($images, Response::HTTP_OK);
    }
}
