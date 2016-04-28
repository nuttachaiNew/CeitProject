<?php
include("config.php");

$status="working";
$date=date('Y-m-d');
	$sql = mysqli_query($Connection,"SELECT workDescription,date,serviceLocation,time FROM educationservice WHERE serviceStatus =  '".$status."' AND date >='".$date."' ORDER BY date ASC LIMIT 1 ");
		 while($row = mysqli_fetch_array($sql)){
		   
		 		echo $row['workDescription'].",";
		 		echo $row['date'].",";
		 		echo $row['time'].",";
		 		echo $row['serviceLocation'];

		 }


?>