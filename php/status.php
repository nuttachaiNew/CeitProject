<?php
$id=$_GET['id'];
$serviceStatus=$_GET['status'];
$date = date('Y-m-d H:i:s');
	include("config.php");
	
	$strSQL = "UPDATE educationservice SET ";
	$strSQL .="serviceStatus = '".$serviceStatus."' ";
	$strSQL .="WHERE serviceID = '".$id."' ";
	$objQuery = mysqli_query($Connection,$strSQL);

if($objQuery)
{
	echo "edit success!";
}else{
	echo "edit fail";
}


?>