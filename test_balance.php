<?php

require __DIR__ . '/vendor/autoload.php';

use GoTotus\Totus\Client;
use GoTotus\Totus\Dto\Balance;
use GoTotus\Totus\Dto\Authenticated;

// Test Balance Dto directly
$data = ['credits' => 1234.56];
$bal = new Balance($data);

assert($bal->credits() === 1234.56, 'credits should be 1234.56');
assert($bal->data()['credits'] === 1234.56, 'data array should contain credits');
assert(str_contains((string)$bal, '1234.56'), '__toString should contain 1234.56');

// Test Authenticated Dto directly
$authData = [
    'authenticated' => true,
    'description' => 'your api_key is working',
    'token_sm' => 'TTT_123...456'
];
$auth = new Authenticated($authData);
assert($auth->authenticated() === true, 'authenticated should be true');
assert($auth->description() === 'your api_key is working', 'description should match');
assert($auth->tokenSm() === 'TTT_123...456', 'tokenSm should match');
assert(str_contains((string)$auth, 'your api_key is working'), '__toString should contain description');

// Test Client methods exist
$client = new Client('fake-test-key');
assert(method_exists($client, 'balance'), 'client must have balance() method');
assert(method_exists($client, 'Balance'), 'client must have Balance() method');
assert(method_exists($client, 'authenticated'), 'client must have authenticated() method');
assert(method_exists($client, 'Authenticated'), 'client must have Authenticated() method');
assert(method_exists($client, 'Utility'), 'client must have Utility() method');

$utility = $client->Utility();
assert(method_exists($utility, 'balance'), 'utility must have balance() method');
assert(method_exists($utility, 'Balance'), 'utility must have Balance() method');
assert(method_exists($utility, 'authenticated'), 'utility must have authenticated() method');
assert(method_exists($utility, 'Authenticated'), 'utility must have Authenticated() method');

echo "phptotus balance and authenticated tests passed!\n";
