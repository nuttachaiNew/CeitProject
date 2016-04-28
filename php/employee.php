<?php
include("config.php");

$sql = mysqli_query($Connection,"SELECT empName FROM  employee WHERE empID Like '".$_POST['empid1']."' or empID Like '".$_POST['empid2']."' or empID Like '".$_POST['empid3']."'");
while($row = mysqli_fetch_array($sql)){
		 	echo $row["empName"].",";
		 	
		
			 }
?> 