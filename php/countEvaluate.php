<?php
 include("config.php");
 $avgValue1;
 $sql = mysqli_query($Connection,"SELECT count(*) as totalEvaluate FROM evaluatetools  ");
	
	$data=mysqli_fetch_assoc($sql);
	echo $data['totalEvaluate'].",";

$sql = mysqli_query($Connection,"SELECT AVG(totalPoint) as totalPoint FROM evaluatetools   	");
	$data=mysqli_fetch_assoc($sql);
	echo number_format($data['totalPoint'],2).",";;
		

$sql = mysqli_query($Connection,"SELECT AVG(value1) as totalVal1 FROM evaluatetools   ");
	$data=mysqli_fetch_assoc($sql);
	$avgValue1= number_format($data['totalVal1'],2);
	echo $avgValue1.",";

$sql = mysqli_query($Connection,"SELECT AVG(value2) as totalVal2 FROM evaluatetools   ");
	$data=mysqli_fetch_assoc($sql);
	$avgValue2= number_format($data['totalVal2'],2);
	echo $avgValue2.",";

$sql = mysqli_query($Connection,"SELECT AVG(value3) as totalVal3 FROM evaluatetools   ");
	$data=mysqli_fetch_assoc($sql);
	$avgValue3= number_format($data['totalVal3'],2);
	echo $avgValue3.",";

$sql = mysqli_query($Connection,"SELECT AVG(value4) as totalVal4 FROM evaluatetools   ");
	$data=mysqli_fetch_assoc($sql);
	$avgValue4= number_format($data['totalVal4'],2);
	echo $avgValue4.",";


$sql = mysqli_query($Connection,"SELECT * FROM evaluate");
while($row = mysqli_fetch_array($sql)){
		 	echo $row["evaluateName"].",";
		 	
		
			 }

?>