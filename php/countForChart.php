
<?php
	// $emp1=$_POST['emp1'];	
	// $status=$_GET['status'];
	$dateFrom=$_GET['dateFrom'];
	$dateTo=$_GET['dateTo'];
	include("config.php");
	$sql = mysqli_query($Connection,"SELECT count(*) as total FROM educationservice es WHERE es.serviceStatus LIKE 'complete' AND (date >= '".$dateFrom."' AND date <= '".$dateTo."' ) ");
	$data=mysqli_fetch_assoc($sql);
	echo $data['total'].",";

	$sql = mysqli_query($Connection,"SELECT count(*) as total FROM educationservice es WHERE es.serviceStatus LIKE 'working' AND (date >= '".$dateFrom."' AND date <= '".$dateTo."' ) ");
	$data=mysqli_fetch_assoc($sql);
	echo $data['total'].",";

$sql = mysqli_query($Connection,"SELECT count(*) as total FROM educationservice es WHERE  (es.serviceStatus LIKE 'approve' OR es.serviceStatus LIKE 'waiting' ) AND (date >= '".$dateFrom."' AND date <= '".$dateTo."' ) ");
	$data=mysqli_fetch_assoc($sql);
	echo $data['total'];
	

?>