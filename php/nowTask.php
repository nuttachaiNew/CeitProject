<?php
include("config.php");

	

$sql = mysqli_query($Connection,"SELECT taskProcess FROM  task WHERE serviceID='".$_POST['id']."' order by progessDate desc limit 1 ");
	 while($row = mysql_fetch_array($sql)){
		 	echo $row["taskProcess"];
		
			 }
?>