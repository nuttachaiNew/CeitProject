<div class="col-sm-offset-3 form-horizontal" id="waits" style="margin-top:1%;display:none;">
        <!-- <h4>งานทีสำเร็จแล้ว</h4> -->
 <table class="table table-responsive">
    <thead>
      <tr>
       <th class="th">วันที่ขอใช้บริการ</th>
        <th class="th">วันที่ดำเนินงาน</th>
        <th class="th">รายละเอียด</th>
        <th class="th">ประเภทของงาน</th>
        <th class="th">สถานที่</th>
        <!-- <th class="th">ความคืบหน้า</th> -->
        
      
      </tr>
    </thead>
    <tbody id="dataGrid">
 
       <?php
           
       // 
      // if (isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
          // echo"login pass";
          // $username=$_SESSION['UserID'];
            include("config.php");
              $status="approve";
            // $serviceID=0;
            
            $sql = mysqli_query($Connection,"SELECT es.requestDate,es.date,es.serviceID,es.workDescription , es.serviceType , es.serviceLocation ,es.serviceStatus ,es.progess FROM educationservice es  WHERE (serviceStatus LIKE '".$status."' OR  serviceStatus LIKE 'waiting' ) AND  (date >= '".$_GET['dateFrom']."' AND date <= '".$_GET['dateTo']."' ) ");
            
              // $sql = mysql_query("SELECT * FROM educationservice WHERE  empID1 LIKE  '".$username."' AND serviceStatus LIKE '".$status."' ");
                while($row = mysqli_fetch_array($sql)){
                  
                  echo "<tr>";
                  echo "<td align='center'>".$row["requestDate"]."</td>";
                      echo "<td align='center'>".$row["date"]."</td>";
                       echo "<td align='left' width='45%'>".$row["workDescription"]."</td>";
                     if($row["serviceType"]=='publicRelation'){
                      echo "<td align='left'>ประชาสัมพันธ์</td>";
                     }else{
                      echo "<td align='left'>การเรียนการสอน</td>";
                     }
                     echo "<td align='left'>".$row["serviceLocation"]."</td>";
                        
                       
                     
                     
                       // echo " <td align='center'><a href='serviceDetail.html' class='btn btn-warning' title='รายละเอียดงาน''><span class='fa fa-file-text-o'></span></a></td>";
                  echo "</tr>";
                  
                }
               
              // }else{
              //   echo "Please Login!";
              // }

        ?>

        </tbody>
    </table>

  </div>