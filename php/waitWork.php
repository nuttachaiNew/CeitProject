
<?php
	$emp1=$_POST['emp1'];	
	$status=$_POST['status'];
	include("config.php");
	$sql = mysqli_query($Connection,"SELECT count(*) as total FROM educationservice es WHERE es.serviceStatus LIKE '".$status."' AND (es.empID1 = '".$emp1."' OR es.empID2 = '".$emp1."' OR es.empID3 = '".$emp1."' ) ");
	$data=mysqli_fetch_assoc($sql);
	echo $data['total'];

	

?>