<?php 
	include("config.php");
	echo "<table class='table table-responsive' style='margin-top:1%;'>";
		echo "<thead>";
		echo "<tr>";
				echo "<th class='th'>วันที่ปฏิบัติงาน</th>";
				echo "<th class='th'>ลักษณะงาน</th>";
				echo "<th class='th'>ประเภทการใช้งาน</th>";
				echo "<th class='th'>ความคืบหน้า</th>";
				
			
			
	echo "</tr>";
	echo  "</thead>";
	echo  "<tbody>";
 	
 	$sql = mysqli_query($Connection,"SELECT workDescription,serviceType,progess,date FROM educationservice WHERE date >= '".$_GET['date']."' AND serviceStatus = '".$_GET['status']."' AND (empID1 = '".$_GET['empID']."' OR empID2 = '".$_GET['empID']."' OR empID3 = '".$_GET['empID']."')  ORDER BY date desc");
	while($row = mysqli_fetch_array($sql)){
			   echo "<td align='center'>".$row["date"]."</td>";
			   echo "<td align='left'>".$row["workDescription"]."</td>";
              if($row["serviceType"]=="education") {
             	echo "<td align='left'>การเรียนการสอน</td>";
             }else{
             	echo "<td align='left'>ประชาสัมพันธ์</td>";
             }
               echo "<td align='center'>".$row["progess"]."%</td>";
             
	}
	echo "</tbody>";
?>