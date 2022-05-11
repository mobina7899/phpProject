<?php
require_once('connect.php');

class News extends Dbconnection
{
    public function __construct()
    {
        parent::__construct();
    }


    public function Show()
    {
        $sql = "SELECT * FROM news ORDER BY date DESC limit 3 ";
        $q = $this->connection->query($sql) or die("failed!");

        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {


            $data[] = $r;
        }
        return $data;
    }

    public function showcat($id)
    {

        $data = array();
        $sql = "SELECT * FROM news  where  fk_cat =" . $id;
        $q = $this->connection->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {

            $data[] = $r;
        }
        return $data;
    }

    public function showSearch($id)
    {

        $data = array();
        $sql = "SELECT * FROM news ,news_cat where   news.fk_cat=news_cat" . $id;
        $q = $this->connection->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {

            $data[] = $r;
        }
        return $data;

    }

    public function Search($id)
    {

        $data = array();
        $sql = "SELECT * FROM news  where title  like'%" . $id . "%' or body like'%" . $id . "%'";
        $q = $this->connection->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {

            $data[] = $r;
        }
        return $data;

    }

    public function ShowAll()
    {
        $sql = "SELECT * FROM news ";
        $q = $this->connection->query($sql) or die("failed!");
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {

            $data[] = $r;

        }
        return $data;

    }

    public function details($sql)
    {
        $query = $this->connection->query($sql);

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function deleteData($id)
    {

        $sql = "DELETE FROM news WHERE id=:id";
        $q = $this->connection->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }


    public function insertData($pic, $body, $media, $title, $fk_cat, $state , $date)
    {

        $sql = "INSERT INTO `news`( `pic`, `body`, `media`, `title`, `fk_cat`, `state` , `date`) VALUES

		(:pic,:body,:media,:title,:fk_cat,:state , :date)";

        $q = $this->connection->prepare($sql);

        $q->execute(array(':pic' => $pic, ':body' => $body, ':media' => $media, ':title' => $title, ':fk_cat' => $fk_cat, ':state' => $state , ':date' => $date));

        $con = $q->rowcount();

        if ($con == 1) {

            return true;
        } else {
            return false;
        }


    }


    public function updatedata($id, $pic, $body, $media, $title, $fk_cat, $state)
    {

        $sql = "UPDATE `news` SET pic=:pic,body=:body ,media=:media,title=:title,fk_cat=:fk_cat,state=:state WHERE id=:id";

        $q = $this->connection->prepare($sql);

        $q->execute(array(':id' => $id, ':pic' => $pic, ':body' => $body, ':media' => $media, ':title' => $title, ':fk_cat' => $fk_cat, ':state' => $state));


        $con = $q->rowcount();

        if ($con == 1) {
            return true;
        } else {

            return false;
        }

    }

    public function getById($id)
    {

        $sql = "SELECT * FROM news WHERE id=" . $id;
        $q = $this->connection->prepare($sql);
        $q->execute(array(':id' => $id));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

}


?>