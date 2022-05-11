<?php
include_once '../porsesh-body.php';
include_once  '../porsesh-pasokh.php';

if(isset($_POST['code_r'])){

    $code = $_POST['code_r'];
    $question = new Porseshpasokh();
    $sql = "select * from porsesh_pasokh where coder = '$code'";
    $result = $question->details($sql);
    $id = $result['id'];
    $answer = new Porsesh();
    $answers = $answer->show($id);
    $response["state"] = "ok";
    $response["number of answers"] = sizeof($answers) - 1;
    if(sizeof($answers) > 1)
    $response["answers"] = $answers;

}else
    $response["state"] = "error";

echo json_encode($response);