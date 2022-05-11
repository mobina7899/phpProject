<?php
include_once '../porsesh-pasokh.php';

$question = new Porseshpasokh();
$questions = $question->showAll();

$response["state"] = "ok";
$response["questions"] = $questions;

echo json_encode($response);