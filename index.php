<?php

use ElectricityTariffComparisonSystem\ComparisonSystem;

include "vendor/autoload.php";

$system = new ComparisonSystem();


var_dump($system->getTariffsByYearlyConsumptionCost(3500));
var_dump($system->getTariffsByYearlyConsumptionCost(4500));
var_dump($system->getTariffsByYearlyConsumptionCost(6000));