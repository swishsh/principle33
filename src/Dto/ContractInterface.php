<?php

namespace App\Dto;

interface ContractInterface
{
    public function getMonthCost(float $usage) : float;
}
