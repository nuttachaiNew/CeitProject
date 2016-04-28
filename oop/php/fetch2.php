<?php 
	include("config.php");
	echo "<table class='table table-responsive' style='margin-top:1%;'>";
		echo "<thead>";
		echo "<tr>";

				echo "<th class='th'>ตัวชี้วัด1</th>";
				echo "<th class='th'>ตัวชี้วัด2</th>";
				
				echo "<th class='th'>ลักษณะงาน</th>";
		
				echo "<th class='th'>ประเภทการใช้งาน</th>";
				echo "<th class='th'>คะแนนประเมิน</th>";
					
			
	echo "</tr>";
	echo  "</thead>";
	echo  "<tbody>";
 	
 	$sql = mysqli_query($Connection,"SELECT workDescription,serviceType,rating,indID1,indID2 FROM educationservice WHERE date >= '".$_GET['date']."' AND serviceStatus = '".$_GET['status']."' AND (empID1 = '".$_GET['empID']."' OR empID2 = '".$_GET['empID']."' OR empID3 = '".$_GET['empID']."')  ORDER BY indID1 asc,indID2 asc,date desc");
	while($row = mysqli_fetch_array($sql)){
			echo "<tr>"; 
			  	 $sql2 = mysqli_query($Connection,"SELECT indicatorName FROM indicators WHERE indicatorID = '".$row['indID1']."' ");
         		 $row2=mysqli_fetch_array($sql2);
         	echo "<td align='left'>".$row2['indicatorName']."</td>";
         		 $sql3 = mysqli_query($Connection,"SELECT indicatorName FROM indicators WHERE indicatorID = '".$row['indID2']."' ");
         		 $row3=mysqli_fetch_array($sql3);
         	echo "<td align='left'>".$row3['indicatorName']."</td>";

			   echo "<td align='left' width='40%'>".$row["workDescription"]."</td>";

         	
         	if($row["serviceType"]=="education") {
             	echo "<td align='left' width='15%'>การเรียนการสอน</td>";
             }else{
             	echo "<td align='left' width='15%'>ประชาสัมพันธ์</td>";
             }
 			 echo "<td align='center'>";
             for ($i=1;$i<=$row["rating"];$i++){
             	echo "<i class='fa fa-star '></i>";
             }
             	echo "</td>";
         
           echo "</tr>";	
	}
	echo "</tbody>";
?>