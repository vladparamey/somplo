<?php

namespace App\Contracts\Parser;

interface UtilityServiceInterface
{
    /**
     * @param string $url
     * @param int $limit
     * @return array
     */
    public function fetchPromoImages(string $url, int $limit = 8): array;
}

