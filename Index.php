<?php
require_once 'vendor/autoload.php';
require_once 'DataProvider.php';

use App\OrderController;

$request = DataProvider::getRequest();
$orderController = new OrderController();

var_dump($orderController->getOrderCost($request));