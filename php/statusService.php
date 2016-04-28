<?php
	
	$status="created";
	include("config.php");
	$sql = mysqli_query($Connection,"SELECT * FROM educationservice");
		 while($row = mysqli_fetch_array($sql)){
		 	echo $row["serviceID"].",";
		 	echo $row["serviceStatus"].".";
		 }
	

?>