<?php
 include("config.php");
 $serviceID=$_GET['id'];
 $sql = mysqli_query($Connection,"SELECT progess,rating FROM educationservice WHERE serviceID='".$serviceID."' ");
      while($row = mysqli_fetch_array($sql)){
      			echo $row['progess'].",";
      			echo $row['rating'];
          }

?>