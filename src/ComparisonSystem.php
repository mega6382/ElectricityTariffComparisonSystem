<?php
declare(strict_types=1);

namespace ElectricityTariffComparisonSystem;

use ElectricityTariffComparisonSystem\Model\Service\TariffSorter;

class ComparisonSystem
{
    /**
     * @var TariffSorter
     */
    private $tariffSorter;

    /**
     * ComparisonSystem constructor.
     */
    public function __construct()
    {
        $this->setTariffSorter(new TariffSorter());
    }

    public function setTariffSorter(TariffSorter $tariffSorter): void
    {
        $this->tariffSorter = $tariffSorter;
    }

    /**
     * Get Tariffs By Yearly Consumption Cost
     * @param float $yearlyConsumption
     * @return array
     * @throws Exception
     */
    public function getTariffsByYearlyConsumptionCost(float $yearlyConsumption): array
    {
        return $this->tariffSorter->getTariffs($yearlyConsumption);
    }
}