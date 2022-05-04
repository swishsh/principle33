<?php

namespace App\Dto;

class Contract implements ContractInterface
{
    private const NORMAL_PERCENTAGE = 0;
    private const BONUS_PERCENTANGE = -5;
    private const PENALTY_PERCENTAGE = 10;

    private string  $productType;
    private string  $productName;
    private float   $productUnitPrice;
    private int     $minimumUsage;
    private int     $maximumUsage;
    private AddressCollection $addressCollection;

    public function __construct(
        string $productType,
        string $productName,
        float $productUnitPrice,
        int $minimumUsage,
        int $maximumUsage,
        AddressCollection $addressCollection
    ) {
        $this->productType = $productType;
        $this->productName = $productName;
        $this->productUnitPrice = $productUnitPrice;
        $this->minimumUsage = $minimumUsage;
        $this->maximumUsage = $maximumUsage;
        $this->addressCollection = $addressCollection;
    }

    public function getMonthCost(float $usage) : float
    {
        var_dump($this->getDefaultCost($usage));
        var_dump($this->getExtraCost($usage) * $this->getPercentage($usage));

        return $this->getDefaultCost($usage) + $this->getExtraCost($usage) * $this->getPercentage($usage);
    }

    private function getDefaultCost($usage) : float
    {
        return $usage * $this->productUnitPrice;
    }

    private function getExtraCost($usage) : float
    {
        return $usage * $this->minimumUsage / 100;
    }

    private function getPercentage($usage) : int
    {
        $percentage = static::NORMAL_PERCENTAGE;

        if ($usage < $this->minimumUsage) {
            $percentage = static::BONUS_PERCENTANGE;
        } elseif ($usage > $this->maximumUsage) {
            $percentage = static::PENALTY_PERCENTAGE;
        }

        return $percentage;
    }
}
