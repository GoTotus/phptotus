#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use GoTotus\Totus\Client;

$totus = new Client(); // picks API key from TOTUS_KEY environment variable

$balance = $totus->balance();
echo "Account Balance: " . number_format($balance->credits(), 2) . " Credits\n";
echo $balance . "\n";
