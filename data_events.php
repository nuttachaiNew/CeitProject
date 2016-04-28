


<?php
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);    

    include("php/config.php");
    $status1="working";
    $status2="approve";
    $status3="complete";
    $color="#F1C54D";
     $sql = mysqli_query($Connection,"SELECT * FROM educationservice WHERE serviceStatus='".$status1."' OR serviceStatus='".$status2."' OR serviceStatus='".$status3."' ");
 while($row = mysqli_fetch_array($sql)){
    if($row['serviceStatus']=="complete"){
      $color="#66FF33";
    }else if($row['serviceStatus']=="approve"){
      $color="#CCFFCC";
    }else if($row['serviceStatus']=="working"){
    $color="#F1C54D";
}
             $json_data[]=array(  
              "id"=>$row['serviceID'],
              "title"=>$row['workDescription'],
              "start"=>$row['date']." ".$row['time'],
              "allDay"=>false,
              "color"=>$color

              );

          }
          $json= json_encode($json_data); 
if(isset($_GET['callback']) && $_GET['callback']!=""){    
echo $_GET['callback']."(".$json.");";        
}else{    
echo $json;    
}    
?>
