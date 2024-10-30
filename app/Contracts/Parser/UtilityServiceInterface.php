<?php

namespace App\Contracts\Parser;

interface UtilityServiceInterface
{
    public function fetchPromoImages(string $url, int $limit = 8): array;
}
