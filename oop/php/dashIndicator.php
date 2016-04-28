
    <div class="col-sm-offset-3 form-horizontal" id="inds" style="margin-top:1%;display:none; ">
        <!-- <h4>งานทีสำเร็จแล้ว</h4> -->
 
          <table class="table table-responsive " >
      <thead>
       <th class="th">ตัวชี้วัด</th>
       <th class="th">จำนวนงานที่ปฏิบัติ</th>
      </thead>
      <tbody>
        <?php
          $qty=0;
            include("config.php");
        $sql = mysqli_query($Connection,"SELECT * FROM indicators ORDER BY indicatorID");
           while($row = mysqli_fetch_array($sql)){
            $qty+=1;
          echo "<tr>";
          echo "<td align='left'>".$row['indicatorName']."</td>";
          echo "<td align='center'><span id='value".$row['indicatorID']."'>0</span></td>";
          echo "</tr>";
        }

        // echo $qty;
         ?>
      </tbody>
    </table>


  </div>

<?php  echo ",".$qty; ?>