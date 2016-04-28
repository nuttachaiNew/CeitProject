<?php
include("config.php");

$user="";
$sql = mysqli_query($Connection,"SELECT username FROM  educationservice WHERE serviceID='".$_POST['id']."'");
	 while($row = mysqli_fetch_array($sql)){
		 			$user=$row['username'];
			 }
$sql2 = mysqli_query($Connection,"SELECT name,telno FROM  user WHERE username='".$user."'");
 while($row2 = mysqli_fetch_array($sql2)){
		 			echo $row2['name'].",";
		 			echo $row2['telno'];
			 }

?>