<?php
include("config.php");

	// $sql = mysql_query("SELECT e.empName,es.empID1,es.empID2 FROM employee e JOIN educationservice es ON e.empID=es.empID1 or e.empID=es.empID2 or e.empID=es.empID3 WHERE es.serviceID='".$_POST['id']."'");
	// 	 while($row = mysql_fetch_array($sql)){
	// 	 	echo $row["empName"];
		
	// 		 }

$sql = mysqli_query($Connection,"SELECT taskProcess FROM  task WHERE serviceID='".$_POST['id']."' order by progessDate desc limit 1 ");
	 while($row = mysqli_fetch_array($sql)){
		 	echo $row["taskProcess"];
		
			 }
?>