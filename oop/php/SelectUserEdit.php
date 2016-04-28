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
	$sql = mysqli_query($Connection,"SELECT *  FROM user WHERE 	username = '".$userId."' ");

if($sql === FALSE) { 
    die(mysqli_error()); // TODO: better error handling
}
while($row = mysqli_fetch_array($sql)){
		echo $row['user_id'] .",".$row['username'].",".$row['password'].",".$row['name'].",".$row['employee_id'].",".$row['department'].",".$row['telno'].",".$row['email'].",".$row['status'].",".$row['img'].",".$row['phone']."";

}
	// session_unset();



	// 


?>