#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use GoTotus\Totus\Client;

$totus = new Client(); // picks API key from TOTUS_KEY environment variable

$auth = $totus->authenticated();
echo "Authenticated: " . ($auth->authenticated() ? "YES" : "NO") . "\n";
echo "Description: " . $auth->description() . "\n";
echo "Token (masked): " . $auth->tokenSm() . "\n";
echo $auth . "\n";
