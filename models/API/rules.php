<?php
include_once '../rules.php';

$rule = new Rules();
$rules = $rule->showAll();

$response["state"] = "ok";
$response["result"] = $rules;

echo json_encode($response);
