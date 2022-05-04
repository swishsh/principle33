<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Builder\ContractBuilder;

class ContractBuilderTest extends TestCase
{
    public function testInvalidAddressInput()
    {
        $data = ['addresses' => [['asdasd']]];

        $this->expectExceptionMessage('[ADDRESS_VALIDATION] invalid address input.');

        $reponse = ContractBuilder::buildContact($data);
    }
}

5400