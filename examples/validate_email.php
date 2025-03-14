#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use GoTotus\Totus\Client;

$totus = new Client(); // can provide api key via constructor or TOTUS_KEY env var
$validate = $totus->Validate();

$emails = [
    'invalid@gototus.com',
    'sdfsdf@sdfsdfsdfsfs.fdfsfs.fdfsds',
    'temporary@blondmail.com',
    'info@x.com',
    'invalid.email@linkedin.com',
    'info@linkedin.com',
    'support.now@gmail.com',
];

foreach ($emails as $email) {
    $result = $validate->email($email);
    echo "email {$email}: good email? " . ($result->result() ? 'YES' : 'NO') . "; with score: {$result->score()}/100\n";
    echo $result . "\n\n";
}
