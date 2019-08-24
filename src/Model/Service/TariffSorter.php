<?php
declare(strict_types=1);

namespace ElectricityTariffComparisonSystem\Model\Service;

use ElectricityTariffComparisonSystem\Exception;
use ElectricityTariffComparisonSystem\Model\Entity\Price;
use ElectricityTariffComparisonSystem\Model\Mapper\Tariff;

class TariffSorter
{

    private $mapper;

    public function __construct()
    {
        $this->mapper = new Tariff();
    }

    /**
     * Gets tariffs by their cost based on yearly consumption
     * @param float $yearlyConsumption
     * @return array
     * @throws Exception
     */
    public function getTariffs(float $yearlyConsumption): array
    {
        $tariffs = $this->mapper->fetchAll();
        return $this->sortTariffsByYearlyCost($tariffs, $yearlyConsumption);
    }

    /**
     * Gets tariffs by their cost based on yearly consumption
     * @param array $tariffs
     * @param float $yearlyConsumption
     * @return array
     * @throws Exception
     */
    private function sortTariffsByYearlyCost(array $tariffs, float $yearlyConsumption): array
    {
        $results = [];
        foreach ($tariffs as $tariff) {
            $results[] = [
                'name' => $tariff->getName(),
                'yearlyCost' => $this->calculateTotalCostOfTariff($tariff->getPrice(), $yearlyConsumption),
            ];
        }

        usort($results, function ($a, $b) {
            return $a['yearlyCost'] <=> $b['yearlyCost'];
        });

        return $results;
    }

    /**
     * Gets the yearly cost of the provided tariff based on the user's yearly consumption
     * @param Price $price
     * @param float $yearlyConsumption
     * @return float
     * @throws Exception
     */
    private function calculateTotalCostOfTariff(Price $price, float $yearlyConsumption): float
    {
        if (!in_array($price->getMode(), Price::ACCEPTED_MODES)) {
            throw new Exception("Invalid price mode provided");
        }

        $yearlyConsumption -= ($price->getAllocatedKwh() * $price->getMode());
        $fixedPrice = ($price->getFixed() * $price->getMode());

        if ($yearlyConsumption <= 0) {
            return $fixedPrice;
        }

        return $fixedPrice + $price->getCostPerKwh() * $yearlyConsumption;


    }
}