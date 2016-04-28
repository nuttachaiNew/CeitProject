
<?php
	$username=$_POST['id'];	
	$status="created";
	include("config.php");
	$sql = mysqli_query($Connection,"SELECT count(*) as total FROM educationservice WHERE serviceStatus = '".$status."' AND username LIKE '".$username."' ");
	$data=mysqli_fetch_assoc($sql);
	echo $data['total'];

	

?>