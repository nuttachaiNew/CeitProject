<?php
	$serviceID=$_POST['serviceID'];
	$ind1=$_POST['ind1'];
	$ind2=$_POST['ind2'];
	$emp1=$_POST['emp1'];
	$emp2=$_POST['emp2'];
	$emp3=$_POST['emp3'];
	$status='approve';
	// echo $serviceID . ",".$ind1.",".$ind2.",".$emp1.",".$emp2.",".$emp3 ;

	include("config.php");


$strSQL = "UPDATE educationservice SET ";
	$strSQL .="empID1 = '".$emp1."' ";
	$strSQL .=",empID2 = '".$emp2."' ";
	$strSQL .=",empID3 = '".$emp3."' ";
	$strSQL .=",indID1 = '".$ind1."' ";
	$strSQL .=",indID2 = '".$ind2."' ";
	$strSQL .="WHERE serviceID = '".$serviceID."' ";
	
		$objQuery = mysqli_query($Connection,$strSQL);


	if($objQuery)
{
	echo "save success!";
	//  destroy all session
}
?>