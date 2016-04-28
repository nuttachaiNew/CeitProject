<?php
$id=$_POST['serviceID'];
$emp1=$_POST['emp1'];
$emp2=$_POST['emp2'];
$emp3=$_POST['emp3'];
	include("config.php");

	$strSQL = "UPDATE educationservice SET ";
	$strSQL .="empID1 = '".$emp1."' ";
	$strSQL .=",empID2 = '".$emp2."' ";
	$strSQL .=",empID3 = '".$emp3."' ";
	$strSQL .="WHERE serviceID = '".$id."' ";


	

	$objQuery = mysqli_query($Connection,$strSQL);



if($objQuery)
{
	echo "edit success!";
}else{
	echo "edit fail";
}

?>