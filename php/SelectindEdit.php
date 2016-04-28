<?php
	session_start();

	// $time= $_SESSION['time'];
	// $date= $_SESSION['date'];
	// $serviceLocation= $_SESSION['serviceLocation'];
// $username=$_SESSION['UserID'];

$userId = $_POST['userid'];
// $userId = "test";
	include("config.php");
	// $sql = mysql_query("SELECT *  FROM educationservice WHERE serviceID = '".$id."' AND username LIKE '".$username."' ");
	$sql = mysqli_query($Connection,"SELECT *  FROM indicators WHERE indicatorID = '".$userId."' ");

if($sql === FALSE) { 
    die(mysqli_error()); // TODO: better error handling
}
while($row = mysqli_fetch_array($sql)){
		echo $row['indicatorID'] .",".$row['indicatorName']."";

}
	// session_unset();



	// 


?>