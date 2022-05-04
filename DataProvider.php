<?php

class DataProvider
{
    private static function getAddressInput() :array
    {
        return [
            [
                'type' => 'postal',
                'street' => 'Square',
                'number' => 7,
                'complement' => '',
                'zipcode' => 555555,
                'city' => 'Bucharest',
                'country' => 'RO'
            ]
        ];
    }

    private static function getContractInput() : array
    {
        return [
            'product_type' => 'postal',
            'product_name' => 'energy',
            'product_unit_price' => 30.0,
            'min_usage' => 200,
            'max_usage' => 1000,
            'addresses' => static::getAddressInput()
        ];
    }

    public static function getRequest() : array
    {
        $request = self::getContractInput();
        $request['usage'] = 180;

        return $request;
    }
}
