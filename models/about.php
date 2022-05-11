<?php
 require_once('connect.php');
 
class About extends Dbconnection
{
	public function __construct()
	{
		parent::__construct();
	}


	 public function showAll(){
		 
         $data=array();
		$sql="SELECT * FROM about_us";
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
		 
		$sql="DELETE FROM about_us WHERE id=:id";
		$q = $this->connection->prepare($sql);
		$q->execute(array(':id'=>$id));
 
		return true;
	 }


    public function insertData($pic,$description,$title){
	 
		$sql = "INSERT INTO `about_us`( `pic`, `description`, `title`)  VALUES(:pic,:description,:title)";
		$q = $this->connection->prepare($sql);
		$q->execute(array(':pic'=>$pic,':description'=>$description,':title'=>$title,));
		
           $con = $q->rowcount();

         if($con==1){

              return true;
		 }

      else{
            return false;
			 }
			

	  }

public function updatedata($id,$pic,$description,$title){
	
 $sql="UPDATE `about_us` SET pic=:pic,description=:description,title=:title WHERE id=:id";
 
 $q = $this->connection->prepare($sql);
 
 $q->execute(array(':id'=>$id ,':pic'=>$pic,':description'=>$description,':title'=>$title));
 
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