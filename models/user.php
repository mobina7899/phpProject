<?php
require_once('connect.php');

class User extends Dbconnection
{
    public function __construct()
    {
        parent::__construct();
    }


    public function showAll(){

        $data=array();
        $sql="SELECT * FROM user ";
        $q = $this->connection->query($sql) or die("failed!");
        while($r = $q->fetch(PDO::FETCH_ASSOC)){

            $data[]=$r;
        }
        return $data;

    }


    public function details($sql)
    {
        $query=$this->connection->query($sql);

        $row=$query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function deleteData($id){

        $sql="DELETE FROM user WHERE id=:id";
        $q = $this->connection->prepare($sql);
        $q->execute(array(':id'=>$id));

        return true;
    }


    public function insertData($username,$password,$name){

        $sql ="INSERT INTO `user`( `username`, `password`, `name`) VALUES

		(:username,:password,:name)";

        $q = $this->connection->prepare($sql);

        $q->execute(array(':username'=>$username,':password'=>$password,':name'=>$name));

        $con = $q->rowcount();

        if($con==1){

            return true;
        }

        else{
            return false;
        }


    }

    public function updatedata($id,$pass){

        $sql="UPDATE `user` SET  password=:pass WHERE id=:id";

        $q = $this->connection->prepare($sql);

        $q->execute(array(':id'=>$id,':pass'=>$pass));


        $con=$q->rowcount();

        if($con==1)
        {
            return true;
        }
        else{

            return false;
        }

    }

}





?>