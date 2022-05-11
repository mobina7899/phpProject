<?php
 require_once('connect.php');
 
class Porsesh extends Dbconnection
{
	public function __construct()
	{
		parent::__construct();
	}


	public function showAll(){
		
        $data=array();
		$sql="SELECT * FROM porsesh_body ";
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
		 
		$sql="DELETE FROM porsesh_body WHERE id=:id";
		$q = $this->connection->prepare($sql);
		$q->execute(array(':id'=>$id));
 
		return true;
	 }

    public function show($id){

        $data=array();
        $sql="SELECT * FROM porsesh_body where fk_question = '$id'";
        $q = $this->connection->query($sql) or die("failed!");
        while($r = $q->fetch(PDO::FETCH_ASSOC)){

            $data[]=$r;
        }
        return $data;

    }
    public function insertData($fk_question,$body,$title,$date,$name,$email){

		$sql ="INSERT INTO `porsesh_body`( `fk_question`, `body`, `title`, `date`, `name`, `email`) VALUES

		(:fk_question,:body,:title,:date,:name,:email)";
		
		$q = $this->connection->prepare($sql);
		
		$q->execute(array(':fk_question'=>$fk_question,':body'=>$body,':title' =>$title,':date'=>$date,':name'=>$name,':email'=>$email));
		
           $con = $q->rowcount();

         if($con==1){

              return true;
		 }

      else{
            return false;
			 }
			

	  }

public function updatedata($id,$fk_question,$body,$date,$name,$email){
	
 $sql="UPDATE `porsesh_body` SET fk-question=:fk-question,body=:body ,date=:date,name=:name ,email=:email WHERE id=:id";
 
 $q = $this->connection->prepare($sql);
 
$q->execute(array(':id'=>$id,':fk-question'=>$fk_question,':body'=>$body,':date'=>$date,':name'=>$name,':email'=>$email));
		
 
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