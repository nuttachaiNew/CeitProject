<html>
<head>
	<meta charset="utf-8">
</head>
	<?php
		session_start();
		$username=$_SESSION['UserID'];
		$date=$_GET['date'];
		$time=$_GET['time'];
		$serviceLocation=$_GET['serviceLocation'];
		$serviceType=$_GET['serviceType'];
		$workDescription=$_GET['workDescription'];
		$subjectCode=$_GET['subjectCode'];
		$subjectName=$_GET['subjectName'];
		$service1=$_GET['service1'];
		$service2=$_GET['service2'];
		$service3=$_GET['service3'];
		$service4=$_GET['service4'];
		$service5=$_GET['service5'];
		$copyQty=$_GET['copyQty'];
		$freeLance=$_GET['freeLance'];
		$whoPay=$_GET['whoPay'];
		$requestDate= date('Y-m-d');
		$recieveDate=$_GET['recieveDate'];
		echo $recieveDate .",".$date;
		$department="";
// 
// 
// 
		// echo $date." ".$time." ".$serviceType." ".$serviceLocation;
			
 			include("config.php");

 			 $sql = mysqli_query($Connection,"SELECT department FROM user WHERE username LIKE '".$username."' ");
	
			$data=mysqli_fetch_assoc($sql);
			$department=$data['department'];


 			$strSQL = "INSERT INTO educationservice ";
			$strSQL .="(date,time,serviceType,serviceLocation,serviceStatus,username,subjectCode,subjectName,service1,service2,service3,service4,service5,copyQty,freeLance,whoPay,workDescription,requestDate,rating,recieveDate,department) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$date."','".$time."' ";
			$strSQL .=",'".$serviceType."','".$serviceLocation."','created','".$username."','".$subjectCode."','".$subjectName."','".$service1."','".$service2."','".$service3."','".$service4."','".$service5."','".$copyQty."','".$freeLance."','".$whoPay."','".$workDescription."','".$requestDate."','0','".$recieveDate."','".$department."') ";
			$objQuery = mysqli_query($Connection,$strSQL);
	if($objQuery)
{
	echo "save success!";
	// $_SESSION["date"]=$date; 
	// $_SESSION["time"]=$time;
	// $_SESSION["serviceLocation"]=$serviceLocation;
	//  destroy all session
}

?>
</html>