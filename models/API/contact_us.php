<?php
include_once '../tamas.php';

$contact = new Tamas();


$response["stste"] = "ok";
$response["result"] = $contact->showAll();


echo json_encode($response);