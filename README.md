# Electricity Tariff Comparison System

## Installation

1. Clone the project.
1. Include the files into your code, or if you are using then include the composer's autoload file.

Example:
```php
<?php

use ElectricityTariffComparisonSystem\ComparisonSystem;

include "vendor/autoload.php";

$system = new ComparisonSystem();

var_dump($system->getTariffsByYearlyConsumptionCost(3500));
var_dump($system->getTariffsByYearlyConsumptionCost(4500));
var_dump($system->getTariffsByYearlyConsumptionCost(6000));

```

## Running the tests

Run `composer install` to install the dependencies. Then run `vendor/bin/phpunit` to run the tests.


