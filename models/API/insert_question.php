<?php
include_once  '../porsesh-pasokh.php';
include_once '../porsesh-body.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once '../jdf.php';
    $date = jdate("Y-m-d H:i:s",'','','','en');
    $title = $_POST['title'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $body = $_POST['body'];
    $question = new Porseshpasokh();
    $code = $question->randomcode();
    $result = $question->insertData($title ,$body , $code , $date  , $name , $email , '0');
    if($result) {
        $question_body = new Porsesh();
        $questions = $question->showAll();
        $last_question_id = $questions[sizeof($questions) - 1]['id'];
        $res = $question_body->insertData($last_question_id, $body, $date, $name, $email);
    }
    $response["state"] = "ok";
    $response["code-r"] = $code;
    $response["result"] = $result && $res ;

}else
    $response["state"] = "error";
echo json_encode($response);