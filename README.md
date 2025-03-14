# Totus PHP Client

A php client for the Totus API.

## Basic Usage

`TOTUS_KEY` environment variable will be used to pick the api
key ([create one here](https://gototus.com/console/apikeys))

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

## Examples

For further examples, check the `examples/` folder in this project.
Or a public copy at the [GitHub Website](https://github.com/GoTotus/phptotus/tree/main/examples).

## Manuals

For detailed manuals about Totus please check: [docs.gototus.com](https://docs.gototus.com)

## Installing

`composer require gototus/totus `

[npmjs.com project page](https://www.npmjs.com/package/totus)

