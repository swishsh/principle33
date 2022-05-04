<?php

namespace App\Builder;

use App\Dto\Contract;
use App\Exception\InvalidContractInputException;

class ContractBuilder
{
    private const MANDATORY_KEYS = [
        'product_type',
        'product_name',
        'product_unit_price',
        'min_usage',
        'max_usage',
        'addresses'
    ];

    /**
     * @throws InvalidContractInputException
     * @throws \App\Exception\InvalidAddressInputException
     */
    public static function buildContact(array $contractInfo) : Contract
    {
        static::validateContract($contractInfo);

        $addresses = AddressBuilder::build($contractInfo['addresses']);

        return new Contract(
            (string)$contractInfo['product_type'],
            (string)$contractInfo['product_name'],
            (float)$contractInfo['product_unit_price'],
            (int)$contractInfo['min_usage'],
            (int)$contractInfo['max_usage'],
            $addresses
        );
    }

    /**
     * @throws InvalidContractInputException
     */
    private static function validateContract($contractInfo) :void
    {
        foreach (static::MANDATORY_KEYS as $mandatoryKey) {
            if (!array_key_exists($mandatoryKey, $contractInfo)) {
                throw new InvalidContractInputException(
                    "[ADDRESS_VALIDATION] invalid address input."
                );
            }
        }
    }
}
