<?php

namespace App\Dto;

class AddressCollection
{
    private array $addreses = [];

    public function addAddress(Address  $address)
    {
        $this->addreses[] = $address;
        return $this;
    }

    public function getAddreses() : array
    {
        return $this->addreses;
    }
}
