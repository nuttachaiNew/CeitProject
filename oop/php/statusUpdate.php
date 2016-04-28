<?php
date_default_timezone_set("Asia/Bangkok"); 
$id=$_GET['id'];
$serviceStatus=$_GET['status'];
$date = date('Y-m-d H:i:s');
$task=0;
if(isset($_GET['addTask'])){
$task=$_GET['addTask'];
}	
	include("config.php");
	$strSQL = "UPDATE educationservice SET ";
	$strSQL .="serviceStatus = '".$serviceStatus."' ";
	$strSQL .=",progess = '0' ";
	$strSQL .="WHERE serviceID = '".$id."' ";
	$objQuery = mysqli_query($Connection,$strSQL);

if($objQuery)
{
	echo "edit success!";
}else{
	echo "edit fail";
}
if($task==1){
	$strSQL = "INSERT INTO task ";
			$strSQL .="(serviceID,taskProcess,progessDate) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$id."','เริ่มดำเนินงาน' ";
			$strSQL .=",'".$date."') ";
			$objQuery = mysqli_query($Connection,$strSQL);
}


?>