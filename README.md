# Totus PHP Client

A php client for the Totus API.

## Installing
```bash
composer require gototus/totus
```

## Usage
```php
require 'vendor/autoload.php';

use GoTotus\Totus\Client;

$totus = new Client(); // can provide api key via constructor or TOTUS_KEY env var

// Reference: GeoPOI
$pois = $totus->Reference()->GeoPOI(gh: '69y7pkxfc', distance: 1000, what: 'shop', limit: 10);
iprint_r(pois);

// Reference: IP
$ipInfo = $totus->Reference()->IP(i4: '8.8.8.8');
print_r($ipInfo);


// Validate: Email
$email = $totus->Validate()->email('info@x.com');
echo $email;
````

## Requirements
- PHP 7.4+
- Guzzle HTTP Client
