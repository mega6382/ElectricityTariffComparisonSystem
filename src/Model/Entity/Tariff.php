<?php
declare(strict_types=1);

namespace ElectricityTariffComparisonSystem\Model\Entity;

class Tariff
{
    /**
     * Name of the Tariff
     * @var string
     */
    private $name;

    /**
     * Price of the Tariff
     * @var Price
     */
    private $price;

    /**
     * Tariff constructor.
     * @param string $name
     * @param Price $price
     */
    public function __construct(string $name, Price $price)
    {
        $this->setName($name);
        $this->setPrice($price);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     */
    public function setPrice(Price $price): void
    {
        $this->price = $price;
    }


}