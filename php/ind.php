<?php
		include("config.php");
			$sql = mysqli_query($Connection,"SELECT count(*) as total FROM educationservice WHERE (empID1 LIKE '".$_GET['empID']."' OR empID2 LIKE '".$_GET['empID']."' OR empID3 LIKE '".$_GET['empID']."' ) AND (indID1 = '".$_GET['indID']."' OR indID2 = '".$_GET['indID']."') AND date >= '".$_GET['date']."' AND (serviceStatus='working' OR serviceStatus='complete')");
			$data=mysqli_fetch_assoc($sql);
			echo $data['total'].",";
 			echo $_GET['indID'];
?>
