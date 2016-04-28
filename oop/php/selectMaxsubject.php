
 

<div class="form-horizontal col-sm-12" style="margin-top:1%" id="tableScrollingY">
  <table class="table table-responsive">
    <thead>
      <tr>
        <th class="th">รหัสวิชา</th>  
        <th class="th">ชื่อวิชา</th>  
        <th class="th">จำนวนการขอใช้บริการ</th>      
      </tr>
    </thead>
    <tbody id="dataGrid">
 
       <?php    
          session_start(); 
        $dateFrom =$_POST['dateFrom'];
        $dateTo =$_POST['dateTo'];
        $limit=$_POST['limit'];

        $_SESSION['type']='subject';
        $_SESSION['dateFrom']= $dateFrom;
        $_SESSION['dateTo']= $dateTo;
         $status1='working';
        $status2='approve';
        $status3='complete';

            include("config.php");
        if($limit=="5"){
              $sql = mysqli_query($Connection,"SELECT COUNT(subjectName) as count, subjectCode, subjectName FROM educationservice WHERE (subjectCode <> 'undefined' OR subjectCode <> '') AND (date >= '".$dateFrom."' AND date <= '".$dateTo."') AND (serviceStatus = '".$status1."'  OR serviceStatus ='".$status2."' OR serviceStatus = '".$status3."' )  GROUP BY subjectName 
              ORDER BY COUNT(subjectName) DESC LIMIT 5 ");
        }else if($limit=="10"){

           $sql = mysqli_query($Connection,"SELECT COUNT(subjectName) as count, subjectCode, subjectName FROM educationservice WHERE (subjectCode <> 'undefined' OR subjectCode <> '') AND (date >= '".$dateFrom."' AND date <= '".$dateTo."') AND (serviceStatus = '".$status1."'  OR serviceStatus ='".$status2."' OR serviceStatus = '".$status3."' )  GROUP BY subjectName 
              ORDER BY COUNT(subjectName) DESC LIMIT 10 ");
        }else if($limit=="20"){

           $sql = mysqli_query($Connection,"SELECT COUNT(subjectName) as count, subjectCode, subjectName FROM educationservice WHERE (subjectCode <> 'undefined' OR subjectCode <> '') AND (date >= '".$dateFrom."' AND date <= '".$dateTo."') AND (serviceStatus = '".$status1."'  OR serviceStatus ='".$status2."' OR serviceStatus = '".$status3."' )  GROUP BY subjectName 
              ORDER BY COUNT(subjectName) DESC LIMIT 20 ");
        }
              while($row = mysqli_fetch_array($sql)){
                  echo "<tr>";
                       
                       echo "<td align='center'>".$row["subjectCode"]."</td>";
                       echo "<td align='left'>".$row["subjectName"]."</td>";
                       echo "<td align='center'>".$row["count"]."</td>";
                       
                       
                  echo "</tr>";
                  
                }            

        ?>
     
        </tbody>
    </table>
  
</div>