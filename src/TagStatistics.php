<?php
namespace Baghayi\PepipostAPI;

use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class TagStatistics
{
    const TAG_STATS_RESOURCE = 'https://api.pepipost.com/v2/tags/stats?%s';

    private $guzzle;

    public function __construct(Client $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function list(DateTime $startDate, string $tag): \Generator
    {
        $params = http_build_query([
            'startdate' => $startDate->format('Y-m-d'),
            'tag' => $tag,
        ]);

        $request = new Request('GET', sprintf(self::TAG_STATS_RESOURCE, $params));
        $response = $this->guzzle->send($request);
        
        $content = json_decode($response->getBody()->getContents(), true)['data'] ?? [];

        foreach($content as $item)
            foreach($item['stats'] as $statsItem)
                yield new EmailMetrics(new DateTime($item['date']), $statsItem['tag_name'], $statsItem['metrics']);
    }

}
