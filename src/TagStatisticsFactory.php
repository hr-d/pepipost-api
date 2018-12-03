<?php
namespace Baghayi\PepipostAPI;

use GuzzleHttp\Client;

class TagStatisticsFactory
{

    public function make(string $apiKey): TagStatistics
    {
        $guzzle = new Client([
            'headers' => [
                "api_key" => $apiKey,
            ],
        ]);

        return new TagStatistics($guzzle);
    }

}
