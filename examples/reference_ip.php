#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use GoTotus\Totus\Client;

$totus = new Client(); // can provide api key via constructor or TOTUS_KEY env var
$reference = $totus->Reference();

echo "Your Public IP ...\n";
$result = $reference->IP();
echo json_encode($result, JSON_PRETTY_PRINT) . "\n\n";

echo "Cloudflare 1.1.1.1 ...\n";
$result = $reference->IP(ip4: '1.1.1.1');
echo json_encode($result, JSON_PRETTY_PRINT) . "\n\n";

echo "Cloudflare IPv6 for previous 1.1.1.1: 2606:4700:4700::1111 ...\n";
$result = $reference->IP(ip6: '2606:4700:4700::1111');
echo json_encode($result, JSON_PRETTY_PRINT) . "\n";