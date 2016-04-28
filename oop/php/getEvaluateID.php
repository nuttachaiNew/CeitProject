<?php
	include("config.php");
	$sql = mysqli_query($Connection,"SELECT evaluateID FROM  evaluate ");
	while($row = mysqli_fetch_array($sql)){
		 	echo $row["evaluateID"].",";
			 }

?>