<?php
include("config.php");

	$sql = mysqli_query($Connection,"SELECT * FROM educationservice WHERE serviceID =  '".$_POST['serviceID']."'");
		 while($row = mysqli_fetch_array($sql)){
		 	echo $row["date"].",";
			echo $row["time"].",";
			echo $row["serviceLocation"].",";
			echo $row["workDescription"].",";
		 	echo $row["empID1"].",";
			echo $row["empID2"].",";
			echo $row["empID3"].",";	  

		 }


?>