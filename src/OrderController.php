<?php

namespace App;

use App\Builder\ContractBuilder;
use App\Dto\Order;
use App\Exception\InvalidInputException;

class OrderController
{
    public function getOrderCost(array $request)
    {
        $response = [
            'status' => 200,
            'error' => '',
            'cost' => null
        ];

        try {
            $contract = ContractBuilder::buildContact($request);
            $order = new Order($contract);
            $response['cost'] = $order->getMonthCost($request['usage']);
        } catch (InvalidInputException $exception) {
            $response['status'] = 400;
            $response['error'] = $exception->getMessage();
        } catch (\Throwable $t) {
            $response['status'] = 500;
            $response['error'] = 'Something went wrong!';
        }

        return $response;
    }
}
