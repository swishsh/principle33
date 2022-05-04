<?php

namespace App\Dto;

class Order
{
    private ContractInterface $contract;

    /**
     * @param ContractInterface $contract
     * @param AddressCollection $addressCollection
     */
    public function __construct(ContractInterface $contract)
    {
        $this->contract = $contract;
    }

    public function getMonthCost($usage) : float
    {
        return $this->contract->getMonthCost($usage);
    }
}
