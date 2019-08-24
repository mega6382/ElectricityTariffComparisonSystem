<?php
declare(strict_types=1);

namespace ElectricityTariffComparisonSystem\Model\Mapper;

use ElectricityTariffComparisonSystem\Model\Entity\Price;
use ElectricityTariffComparisonSystem\Model\Entity\Tariff as TariffEntity;

class Tariff
{
    /**
     * @var TariffEntity[]
     */
    private $tariffs;

    public function __construct()
    {
        $this->loadSampleData();
    }

    /**
     * Add the sample tariffs that were provided
     */
    private function loadSampleData()
    {
        $simplePowerTariff = new Price(
            Price::ACCEPTED_MODES['MONTHLY'],
            5,
            .22
        );

        $powerPackage = new Price(
            Price::ACCEPTED_MODES['YEARLY'],
            800,
            .3,
            4000
        );

        $this->tariffs[] = new TariffEntity("Simple Power Tariff", $simplePowerTariff);
        $this->tariffs[] = new TariffEntity("Power Package", $powerPackage);
    }

    /**
     * Get all the tariffs
     * @return TariffEntity[]
     */
    public function fetchAll()
    {
        return $this->tariffs;
    }
}