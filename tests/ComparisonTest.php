<?php
declare(strict_types=1);


use ElectricityTariffComparisonSystem\ComparisonSystem;
use ElectricityTariffComparisonSystem\Model\Entity\Price;
use PHPUnit\Framework\TestCase;

final class ComparisonTest extends TestCase
{
    protected $system;

    public function testCompare(): void
    {
        $tariffs = $this->system->getTariffsByYearlyConsumptionCost(3500);
        $this->assertIsArray($tariffs);

        foreach ($tariffs as $tariff) {
            $this->assertArrayHasKey("name", $tariff);
            $this->assertArrayHasKey("yearlyCost", $tariff);
        }
    }

    public function testAssignmentRequirements(): void
    {
        $tariffs = $this->system->getTariffsByYearlyConsumptionCost(3500);
        $this->assertIsArray($tariffs);

        $this->assertEquals('Power Package', $tariffs[0]['name']);
        $this->assertEquals(800, $tariffs[0]['yearlyCost']);

        $this->assertEquals('Simple Power Tariff', $tariffs[1]['name']);
        $this->assertEquals(830, $tariffs[1]['yearlyCost']);
    }

    public function testAssignmentRequirements2(): void
    {
        $tariffs = $this->system->getTariffsByYearlyConsumptionCost(4500);
        $this->assertIsArray($tariffs);

        $this->assertEquals('Power Package', $tariffs[0]['name']);
        $this->assertEquals(950, $tariffs[0]['yearlyCost']);

        $this->assertEquals('Simple Power Tariff', $tariffs[1]['name']);
        $this->assertEquals(1050, $tariffs[1]['yearlyCost']);
    }

    public function testAssignmentRequirements3(): void
    {
        $tariffs = $this->system->getTariffsByYearlyConsumptionCost(6000);
        $this->assertIsArray($tariffs);

        $this->assertEquals('Simple Power Tariff', $tariffs[0]['name']);
        $this->assertEquals(1380, $tariffs[0]['yearlyCost']);

        $this->assertEquals('Power Package', $tariffs[1]['name']);
        $this->assertEquals(1400, $tariffs[1]['yearlyCost']);
    }

    public function testInvalidTariffMapper(): void
    {
        $this->expectException(TypeError::class);

        $this->system->setTariffSorter("INVALID");
    }

    public function testInvalidPrice(): void
    {
        $this->expectException(\ElectricityTariffComparisonSystem\Exception::class);

        $price = new Price(23);
    }

    protected function setUp(): void
    {
        $this->system = new ComparisonSystem();
    }
}