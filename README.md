# Totus PHP Client

A php client for the Totus API.

## Installation
```bash
composer require yourname/totus-phpj```

## Usage
```php
require 'vendor/autoload.php';

use YourName\Totus\Totus;

$totus = new Totus('your-api-key');


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
