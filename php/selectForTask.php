<?php

include("config.php");

	$sql = mysqli_query($Connection,"SELECT * FROM educationservice WHERE serviceID =  '".$_POST['serviceID']."'");
		 while($row = mysqli_fetch_array($sql)){
		 	echo $row["serviceID"].",";
			echo $row["date"].",";
			echo $row["time"].",";
			echo $row["workDescription"].",";
			echo $row["serviceLocation"].",";
			echo $row["progess"].",";
			echo $row["recieveDate"].",";
		  			  		  			  

		 }


?>