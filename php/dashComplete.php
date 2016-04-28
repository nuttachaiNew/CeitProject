<div class="col-sm-offset-3 form-horizontal" id="coms" style="margin-top:1%;display:none; ">
        <!-- <h4>งานทีสำเร็จแล้ว</h4> -->
 <table class="table table-responsive">
    <thead>
      <tr>
        <th class="th">วันที่ขอบริการ</th>
        <th class="th">รายละเอียด</th>
        <th class="th">ประเภทของงาน</th>
        <!-- <th class="th">สถานะงาน</th> -->
        <th class="th">การประเมิณงาน</th>
        <!-- <th class="th"></th> -->
      </tr>
    </thead>
    <tbody id="dataGrid">
 
       <?php
           
       // 
      // if (isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
          // echo"login pass";
          // $username=$_SESSION['UserID'];
            include("config.php");
              $status="complete";
            // $serviceID=0;
            
            $sql = mysqli_query($Connection,"SELECT es.requestDate,es.serviceID,es.workDescription , es.serviceType , es.serviceLocation ,es.serviceStatus,es.rating FROM educationservice es  WHERE serviceStatus LIKE '".$status."' AND  (date >= '".$_GET['dateFrom']."' AND date <= '".$_GET['dateTo']."' ) ");
            
              // $sql = mysql_query("SELECT * FROM educationservice WHERE  empID1 LIKE  '".$username."' AND serviceStatus LIKE '".$status."' ");
                while($row = mysqli_fetch_array($sql)){
                  
                  echo "<tr>";
                      echo "<td align='center'>".$row["requestDate"]."</td>";
                       echo "<td align='left' width='50%'>".$row["workDescription"]."</td>";
                     if($row["serviceType"]=='publicRelation'){
                      echo "<td align='left'>ประชาสัมพันธ์</td>";
                     }else{
                      echo "<td align='left'>การเรียนการสอน</td>";
                     }
                        echo "<td align='center'>";
                             for ($i=1;$i<=$row["rating"];$i++){
                              echo "<i class='fa fa-star fa-fw'></i>";
                             }
                            
                          echo "</td>";
                       
                     
                     
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