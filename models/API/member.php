<?php

include_once('../company_member.php');

$member= new companymember();

$members=$member->showAll();

$response["stat"]="ok";
$response["member"]=$members;
echo json_encode($response);







?>