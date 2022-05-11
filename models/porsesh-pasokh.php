<?php
require_once('connect.php');

class Porseshpasokh extends Dbconnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function randomcode()
    {
        $code = bin2hex(openssl_random_pseudo_bytes(3));

        $sql = "SELECT * FROM porsesh_pasokh WHERE coder='$code'";
        $q = $this->connection->query($sql);

        $r = $q->fetch(PDO::FETCH_ASSOC);
        if ($r != '') {
            return $this->randomcode();
        } else {
            return $code;
        }

    }

    public function showAll()
    {

        $data = array();
        $sql = "SELECT * FROM porsesh_pasokh ";
        $q = $this->connection->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {

            $data[] = $r;
        }
        return $data;

    }

    public function show($id)
    {

        $data = array();
        $sql = "SELECT * FROM porsesh_pasokh where state = '$id'";
        $q = $this->connection->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {

            $data[] = $r;
        }
        return $data;

    }

    public function Search($code){


        $sql="SELECT * FROM porsesh_pasokh  WHERE coder ='$code'";
        $q = $this->connection->query($sql);
        $r = $q->fetch(PDO::FETCH_ASSOC);


        return $r;

    }

    public function details($sql)
    {
        $query = $this->connection->query($sql);

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function getById($id)
    {
        $sql="SELECT * FROM porsesh_pasokh WHERE id=".$id ;
        $query=$this->connection->query($sql);
        $query->execute(array(':id'=>$id));
        $row=$query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
    public function deleteData($id)
    {

        $sql = "DELETE FROM porsesh_pasokh WHERE id=:id";
        $q = $this->connection->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }


    public function insertData($title , $porsesh, $coder, $date, $name, $email, $state)
    {

        $sql = "INSERT INTO `porsesh_pasokh`( `porsesh`,`title` , `coder`, `date`, `name`, `email`, `state`) VALUES 

		(:porsesh,:title ,:coder,:date,:name,:email,:state)";

        $q = $this->connection->prepare($sql);

        $q->execute(array(':porsesh' => $porsesh,':title' => $title, ':coder' => $coder, ':date' => $date, 'name' => $name, 'email' => $email, ':state' => $state));

        $con = $q->rowcount();

        if ($con == 1) {

            return true;
        } else {
            return false;
        }


    }

    public function updatedata($id, $porsesh,$title, $coder, $date, $name, $email, $state)
    {

        $sql = "UPDATE `porsesh_pasokh` SET porsesh=:porsesh,title=:title,coder=:coder,date=:date,name=:name,email=:email,state=:state WHERE id=:id";

        $q = $this->connection->prepare($sql);

        $q->execute(array(':id' => $id, ':porsesh' => $porsesh,':title' => $title, ':coder' => $coder, ':date' => $date, 'name' => $name, 'email' => $email, ':state' => $state));


        $con = $q->rowcount();

        if ($con == 1) {
            return true;
        } else {

            return false;
        }

    }

    public function lastId()
    {

        return $this->connection->lastInsertId();

    }

}


?>