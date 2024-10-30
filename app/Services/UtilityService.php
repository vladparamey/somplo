<?php

namespace App\Services;

use App\Contracts\Parser\UtilityServiceInterface;
use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Http;

class UtilityService implements UtilityServiceInterface
{
    public function fetchPromoImages(string $url, int $limit = 8): array
    {
        $html = $this->fetchHtmlContent($url);

        if (! $html) {
            return [];
        }

        $xpath = $this->initializeXPath($html);

        return $this->extractImageUrls($xpath, $limit);
    }

    protected function fetchHtmlContent(string $url): ?string
    {
        $response = Http::get($url);

        return $response->successful() ? $response->body() : null;
    }

    protected function initializeXPath(string $html): DOMXPath
    {
        $dom = new DOMDocument;
        @$dom->loadHTML($html);

        return new DOMXPath($dom);
    }

    protected function extractImageUrls(DOMXPath $xpath, int $limit): array
    {
        $images = [];

        foreach ($xpath->query('//a[contains(@class, "promo-tile")]//img[contains(@class, "image")]') as $imageNode) {
            $images[] = $imageNode->getAttribute('src');

            if (count($images) >= $limit) {
                break;
            }
        }

        return $images;
    }
}
