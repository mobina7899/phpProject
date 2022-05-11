<?php
//include_once $_SERVER['DOCUMENT_ROOT'] . '/controlPanel/config.php';

function validName($str)
{
    return preg_match('/^([a-zA-Z]+(\d*))*$/', $str);
}

function validPhone($str)
{
    return preg_match('/^(09)\d{9}$/', $str);
}

function validPass($str)
{
    return preg_match('/^\w{8}$/', $str);
}

function validUsername($str)
{
    return preg_match('/^([a-zA-Z]+(\d*))*$/', $str);
}

function validEmail($str)
{
    return preg_match('/^[w]{3}\.(\w*)@(gmail|email|yahoo)\.(com)$/', $str);
}

function validAge($str)
{
    return preg_match('/^\d{1,3}$/', $str);
}

