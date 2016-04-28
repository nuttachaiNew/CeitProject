<?php
include("config.php");
 $empid=$_GET['empID'];
 $date=$_GET['date'];
 $status1="complete";
 $status2="working";
$sql1 = mysqli_query($Connection,"SELECT count(*) as completeWork FROM educationservice WHERE serviceStatus = '".$status1."' AND (empID1 = '".$empid."' OR empID2 = '".$empid."' OR empID3 = '".$empid."') AND date  >='".$date."' ");
$data1=mysqli_fetch_assoc($sql1);
echo $data1['completeWork'].",";	

$sql2 = mysqli_query($Connection,"SELECT count(*) as working FROM educationservice WHERE serviceStatus = '".$status2."' AND (empID1 = '".$empid."' OR empID2 = '".$empid."' OR empID3 = '".$empid."') AND date  >='".$date."' ");
$data2=mysqli_fetch_assoc($sql2);
echo $data2['working'];	



?>