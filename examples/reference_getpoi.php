#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use GoTotus\Totus\Client;

$totus = new Client(); // can provide api key via constructor or TOTUS_KEY env var
$reference = $totus->Reference();

echo "Any shop nearby:\n";
print_r($reference->GeoPOI(gh: '69y7pkxfc', distance: 1000, what: 'shop', limit: 2));

echo "Any shop nearby, but providing lat/lon instead of geohash:\n";
print_r($reference->GeoPOI(lat: -34.60362, lon: -58.3824, what: 'shop', limit: 2));

echo "Only bookshops, 2km around:\n";
print_r($reference->GeoPOI(gh: '69y7pkxfc', distance: 2000, what: 'shop', filter: ['shop' => 'books'], limit: 2));

echo "Only bookshops, 2km around, name includes the word 'libro' in any case:\n";
print_r($reference->GeoPOI(gh: '69y7pkxfc', distance: 2000, what: 'shop', filter: ['shop' => 'books', 'name' => '~*libro*'], limit: 2));