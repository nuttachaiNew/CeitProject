
<?php
	session_start();
	// $time= $_SESSION['time'];
	// $date= $_SESSION['date'];
	// $serviceLocation= $_SESSION['serviceLocation'];
// $username=$_SESSION['UserID'];
$id=$_GET["id"];
$_SESSION['serviceID']=$id;
	include("config.php");
	// $sql = mysql_query("SELECT *  FROM educationservice WHERE serviceID = '".$id."' AND username LIKE '".$username."' ");
	$sql = mysqli_query($Connection,"SELECT *  FROM educationservice WHERE serviceID = '".$id."' ");

if($sql === FALSE) { 
    die(mysqli_error($Connection)); // TODO: better error handling
}
while($row = mysqli_fetch_array($sql)){
		echo $row['serviceID'] .",".$row['time'].",".$row['date'].",".$row['serviceLocation'].",".$row['serviceStatus'].",".$row['workDescription'].",";
		echo $row['serviceType'].",".$row['copyQty'].",";
		
			echo $row['service1'].",".$row['service2'].",".$row['service3'].",".$row['service4'].",";
			echo $row['freeLance'].",".$row['whoPay'].",".$row['recieveDate'];
}
	// session_unset();

	mysqli_close($Connection);

	// 


?>