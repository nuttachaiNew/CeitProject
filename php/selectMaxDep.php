


<div class="form-horizontal col-sm-12" style="margin-top:1%" id="tableScrollingY">
  <table class="table table-responsive">
    <thead>
      <tr>        
        <th class="th">ชื่อหน่วยงาน</th>  
        <th class="th">จำนวนการขอใช้บริการ</th>
      </tr>
    </thead>
    <tbody id="dataGrid">
 
       <?php    
       session_start();
       
        $dateFrom =$_POST['dateFrom'];
        $dateTo =$_POST['dateTo'];
        $limit=$_POST['limit'];

        $_SESSION['type']='department';
        $_SESSION['dateFrom']= $dateFrom;
        $_SESSION['dateTo']= $dateTo;
        $status1='working';
        $status2='approve';
        $status3='complete';
            include("config.php");
            if($limit=="5"){
               $sql = mysqli_query($Connection,"SELECT COUNT(department) as count, department FROM educationservice WHERE date>='".$dateFrom ."' AND date<='".$dateTo."' AND (serviceStatus = '".$status1."'  OR serviceStatus ='".$status2."' OR serviceStatus = '".$status3."' ) GROUP BY department 
              ORDER BY COUNT(department) DESC LIMIT 5 ");
            }else if($limit=="10"){
               $sql = mysqli_query($Connection,"SELECT COUNT(department) as count, department FROM educationservice WHERE date>='".$dateFrom ."' AND date<='".$dateTo."' AND (serviceStatus = '".$status1."'  OR serviceStatus ='".$status2."' OR serviceStatus = '".$status3."' ) GROUP BY department 
              ORDER BY COUNT(department) DESC LIMIT 10 ");
            }else if($limit=="20"){
               $sql = mysqli_query($Connection,"SELECT COUNT(department) as count, department FROM educationservice WHERE date>='".$dateFrom ."' AND date<='".$dateTo."' AND (serviceStatus = '".$status1."'  OR serviceStatus ='".$status2."' OR serviceStatus = '".$status3."' ) GROUP BY department 
              ORDER BY COUNT(department) DESC LIMIT 20 ");
            }
             
              while($row = mysqli_fetch_array($sql)){
                  echo "<tr>";                       
                       
                       echo "<td align='left'>".$row["department"]."</td>";
                       echo "<td align='center'>".$row["count"]."</td>";
                       
                  echo "</tr>";
                  
                }            

        ?>
     
        </tbody>
    </table>
  </div>


   