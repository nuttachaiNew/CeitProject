<?php
date_default_timezone_set("Asia/Bangkok"); 
$id=$_GET['id'];
$progess=$_GET['progess'];
$date = date('Y-m-d H:i:s');
$taskProcess=$_GET['taskProgess'];
	include("config.php");

	$strSQL = "UPDATE educationservice SET ";
	$strSQL .="progess ='".$progess."'";
	$strSQL .="WHERE serviceID = '".$id."' ";
	$objQuery = mysqli_query($Connection,$strSQL);

if($objQuery)
{
	echo "edit success!";
}else{
	echo "edit fail";
}
$strSQL = "INSERT INTO task ";
			$strSQL .="(serviceID,taskProcess,progessDate) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$id."','".$taskProcess."' ";
			$strSQL .=",'".$date."') ";
			$objQuery = mysqli_query($Connection,$strSQL);

?>