<?php
declare(strict_types=1);

namespace ElectricityTariffComparisonSystem\Model\Entity;

use ElectricityTariffComparisonSystem\Exception;

class Price
{
    /**
     * Modes of payments that are accepted
     */
    public const ACCEPTED_MODES = [
        'MONTHLY' => 12,
        'YEARLY' => 1
    ];
    /**
     * Mode of payment, monthly or yearly
     * @var int
     */
    private $mode;
    /**
     * Fixed price paid per year or month
     * @var float
     */
    private $fixed;
    /**
     * Cost of each kwh
     * @var float
     */
    private $costPerKwh;
    /**
     * Free kwh allocated, can be used without additional cost
     * @var float
     */
    private $allocatedKwh;

    public function __construct($mode, $fixed = 0, $costPerKwh = 0, $allocatedKwh = 0)
    {
        $this->setMode($mode);
        $this->setFixed($fixed);
        $this->setCostPerKwh($costPerKwh);
        $this->setAllocatedKwh($allocatedKwh);
    }

    /**
     * @return int
     */
    public function getMode(): int
    {
        return $this->mode;
    }

    /**
     * @param int $mode
     * @throws Exception
     */
    public function setMode(int $mode): void
    {
        if (!in_array($mode, self::ACCEPTED_MODES)) {
            throw new Exception("Invalid mode");
        }
        $this->mode = $mode;
    }

    /**
     * @return float
     */
    public function getFixed(): float
    {
        return $this->fixed;
    }

    /**
     * @param float $fixed
     */
    public function setFixed(float $fixed): void
    {
        $this->fixed = $fixed;
    }

    /**
     * @return float
     */
    public function getCostPerKwh(): float
    {
        return $this->costPerKwh;
    }

    /**
     * @param float $costPerKwh
     */
    public function setCostPerKwh(float $costPerKwh): void
    {
        $this->costPerKwh = $costPerKwh;
    }

    /**
     * @return float
     */
    public function getAllocatedKwh(): float
    {
        return $this->allocatedKwh;
    }

    /**
     * @param float $allocatedKwh
     */
    public function setAllocatedKwh(float $allocatedKwh): void
    {
        $this->allocatedKwh = $allocatedKwh;
    }
}