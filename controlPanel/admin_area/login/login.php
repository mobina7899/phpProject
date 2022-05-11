<?php
//session_start();


include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/controlPanel/Validation.php';

class login extends Dbconnection
{
    public function __construct()
    {
        parent::__construct();
    }

    // Class propertis :

    private $username;
    private $pass;

    //----------------------------------------------------------------

    //full constructor :

    public function log_in($username, $pass)
    {

        $this->pass = $pass;
        if (!isset($this->pass) || empty($this->pass))
            $_SESSION['message'] = "Enter Password !";

        $this->username = $username;
        if (!isset($this->username) || empty($this->username))
            $_SESSION['message'] = "Enter Username !";

    }

    //----------------------------------------------------------------

    //Check the validity of the data And check user exists or not :

    public function login_validation()
    {
        if (validName($this->username) && validPass($this->pass)) {
            if ($this->search($this->username, $this->pass)) {
                $_SESSION['username'] = $this->username;
                $_SESSION['pass'] = $this->pass;

                return true;
            } else
                $_SESSION['message'] = 'You have not logged in !';
        } else
            $_SESSION['message'] = 'Username or Password is incorrect !';
        return false;
    }

    //----------------------------------------------------------------

    function search($username, $pass)
    {
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$pass' ";
        $result = $this->connection->query($sql) or die("failed!");
        if ($result->rowcount()) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = $row['id'];
        }
        return $result->rowcount();
    }

}