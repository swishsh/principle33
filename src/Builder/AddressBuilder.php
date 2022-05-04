<?php

namespace App\Builder;

use App\Dto\Address;
use App\Dto\AddressCollection;
use App\Exception\InvalidAddressInputException;

class AddressBuilder
{
    private const MANDATORY_KEYS = [
        'street',
        'type',
        'number',
        'complement',
        'zipcode',
        'city',
        'country'
    ];

    /**
     * @throws InvalidAddressInputException
     */
    public static function build(array $addresses) : AddressCollection
    {
        $addressCollection = new AddressCollection();

        foreach ($addresses as $address) {
            self::validateAddress($address);
            $addressCollection->addAddress(self::buildAddress($address));
        }

        return $addressCollection;
    }

    private static function buildAddress($addressInfo)
    {
        $address = new Address();
        $address->setStreet((string)$addressInfo['street'])
            ->setType((string)$addressInfo['type'])
            ->setNumber((int)$addressInfo['number'])
            ->setComplement((string)$addressInfo['complement'])
            ->setZipcode((int)$addressInfo['zipcode'])
            ->setCity((string)$addressInfo['city'])
            ->setCountry((string)$addressInfo['country']);

        return $address;
    }

    private static function validateAddress($addressInfo)
    {
        foreach (static::MANDATORY_KEYS as $mandatoryKey) {
            if (!array_key_exists($mandatoryKey, $addressInfo)) {
                throw new InvalidAddressInputException(
                    "[ADDRESS_VALIDATION] invalid address input."
                );
            }
        }
    }
}
