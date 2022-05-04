<?php

namespace App\Dto;

class Address
{
    private string $street;
    private string $type;
    private int $number;
    private string $complement;
    private int $zipcode;
    private string $city;
    private string $country;

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Address
    {
        $this->type = $type;
        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): Address
    {
        $this->number = $number;
        return $this;
    }

    public function getComplement(): string
    {
        return $this->complement;
    }

    public function setComplement(string $complement): Address
    {
        $this->complement = $complement;
        return $this;
    }

    public function getZipcode(): int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): Address
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): Address
    {
        $this->country = $country;
        return $this;
    }
}
