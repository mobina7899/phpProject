<?php
include_once '../eslider.php';
include_once '../customer.php';

$eslider = new Eslider();
$esliders = $eslider->showAll();

$customer = new Customer();
$customers = $customer->showAll();

$response["state"] = "ok";
$response["eslider"] = $esliders;
$response["customer"] = $customers;
echo json_encode($response);
