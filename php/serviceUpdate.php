<?php
$id=$_GET['id'];
$time=$_GET['time'];
$date=$_GET['date'];
$serviceLocation=$_GET['serviceLocation'];
$descript=$_GET['workDescription'];
	include("config.php");
	$strSQL = "UPDATE educationservice SET ";
	$strSQL .="time = '".$time."' ";
	$strSQL .=",date = '".$date."' ";
	$strSQL .=",serviceLocation = '".$serviceLocation."' ";
	$strSQL .=",workDescription = '".$descript."' ";
	$strSQL .="WHERE serviceID = '".$id."' ";
	$objQuery = mysqli_query($Connection,$strSQL);
if(! $objQuery )
{
  die('Could not get data: ' . mysqli_error());
}

if($objQuery)
{
	echo "edit success!";
}else{
	echo "edit fail";
}


?>