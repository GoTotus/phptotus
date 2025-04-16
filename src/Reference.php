<?php

namespace GoTotus\Totus;

use GoTotus\Totus\Dto\POI;

class Reference
{
    private $totus;

    public function __construct(Client $totus)
    {
        $this->totus = $totus;
    }

    public function GeoPOI(
        ?float $lat = null,
        ?float $lon = null,
        ?string $gh = null,
        ?string $what = null,
        ?float $distance = null,
        ?array $filter = null,
        ?int $limit = null
    ): array {
        $params = [];
        if ($lat !== null && $lon !== null) {
            $params['lat'] = $lat;
            $params['lon'] = $lon;
        }
        if ($gh !== null) $params['gh'] = $gh;
        if ($what !== null) $params['what'] = $what;
        if ($distance !== null) $params['dist'] = $distance;
        if ($filter !== null) {
            $params['filter'] = array_map(fn($k, $v) => "$k=$v", array_keys($filter), $filter);
        }
        if ($limit !== null) $params['limit'] = $limit;

        $response = $this->totus->request('GET', '/ref/geo/poi', $params);
        return array_map(fn($item) => new POI($item), $response);
    }

    public function NetIP(?string $ip4 = null, ?string $ip6 = null): array
    {
        $params = [];
        if ($ip4) $params['ip4'] = $ip4;
        elseif ($ip6) $params['ip6'] = $ip6;
        return $this->totus->request('GET', '/ref/net/ip', $params);
    }
}