<?php
include("config.php");
$user=$_GET['user'];
 $sql = mysqli_query($Connection,"SELECT count(*) as total FROM evaluateTools  WHERE user LIKE '".$user."' ");
  $data=mysqli_fetch_assoc($sql);
  $count= $data['total'];
  if($count==0){

  }else{
  	 $sql = mysqli_query($Connection,"SELECT value1,value2,value3,value4 FROM evaluateTools  WHERE user LIKE '".$user."' ");
  	 	 while($row = mysqli_fetch_array($sql)){
		 	echo $row["value1"].",";
			echo $row["value2"].",";
			echo $row["value3"].",";
			echo $row["value4"];
		
			 }
  }

?>