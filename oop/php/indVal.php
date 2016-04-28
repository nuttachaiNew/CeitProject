<?php
		include("config.php");
			$sql = mysqli_query($Connection,"SELECT count(*) as total FROM educationservice WHERE (indID1 = '".$_GET['indID']."' OR indID2 = '".$_GET['indID']."') AND ( date >= '".$_GET['dateFrom']."' AND date <= '".$_GET['dateTo']."') AND (serviceStatus='working' OR serviceStatus='complete')");
			$data=mysqli_fetch_assoc($sql);
			echo $data['total'].",";
 			echo $_GET['indID'];
?>
