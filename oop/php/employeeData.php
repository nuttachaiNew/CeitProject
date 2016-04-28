<?php
include("config.php");

	// $sql = mysql_query("SELECT e.empName,es.empID1,es.empID2 FROM employee e JOIN educationservice es ON e.empID=es.empID1 or e.empID=es.empID2 or e.empID=es.empID3 WHERE es.serviceID='".$_POST['id']."'");
	// 	 while($row = mysql_fetch_array($sql)){
	// 	 	echo $row["empName"];
		
	// 		 }

$sql = mysqli_query($Connection,"SELECT workDescription,serviceID,empID1,empID2,empID3 FROM  educationservice WHERE serviceID='".$_POST['id']."'");
	 while($row = mysqli_fetch_array($sql)){
		 	echo $row["empID1"].",";
		 	echo $row["empID2"].",";
		 	echo $row["empID3"].",";
			echo $row['serviceID'].",";		
			 echo $row['workDescription'];
			 }
?>