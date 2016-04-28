<?php
include("config.php");

	$sql = mysqli_query($Connection,"SELECT * FROM user WHERE username LIKE  '".$_GET['UserID']."'");
		 while($row = mysqli_fetch_array($sql)){
		 	if($row['status']=='Approver'){
		 		echo "1";
		 	}else {echo "0";}
				  

		 }


?>