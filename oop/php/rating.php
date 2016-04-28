<?php
$id=$_GET['id'];
$rating=$_GET['rating'];

	include("config.php");

	$strSQL = "UPDATE educationservice SET ";
	$strSQL .="rating ='".$rating."'";
	$strSQL .="WHERE serviceID = '".$id."' ";
	$objQuery = mysqli_query($Connection,$strSQL);

if($objQuery)
{
	echo "edit success!";
}else{
	echo "edit fail";
}


?>