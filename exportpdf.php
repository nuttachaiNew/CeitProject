
<?php
// require ('connect.php');
require_once('mpdf/mpdf.php');
ob_start();
?>



<?php

  
  session_start();
  include("php/config.php");
 
  $serid=$_SESSION['serviceID']; 
  
  

  if(isset($_SESSION['serviceID'])){

    $result1 = mysqli_query($Connection,"SELECT username FROM educationservice WHERE serviceID LIKE $serid ");
    while($row = mysqli_fetch_array($result1)) {

    $username1 = $row['username'];

  }

  }


  
  $result = mysqli_query($Connection,"SELECT educationservice.*, user.* FROM educationservice, user WHERE educationservice.serviceID LIKE $serid AND user.username LIKE '".$username1."'");
  while($row = mysqli_fetch_array($result)) {
    
    $username = $row['username'];
    $date = $row['date'];
    $requestDate = $row['requestDate'];
    $time=$row['time'];
    $serviceLocation = $row['serviceLocation'];
    $subjectCode = $row['subjectCode'];
    $subjectName = $row['subjectName'];
    $serviceType = $row['serviceType'];
    $service1 = $row['service1'];
    $service2 = $row['service2'];
    $service3 = $row['service3'];
    $service4 = $row['service4'];
    $service5 = $row['service5'];
    $copyQty = $row['copyQty'];
    $freeLance = $row['freeLance'];
    $whoPay = $row['whoPay'];
    $workDes = $row['workDescription'];
    $recieveDate = $row['recieveDate'];

    $name = $row['name'];
    $employee_id = $row['employee_id'];
    $department = $row['department'];
    $telno = $row['telno'];
    $phone = $row['phone'];
    $email = $row['email']; 

    
    

  }


?> 




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/master.css">
  <link rel="stylesheet" type="text/css" href="css/datepicker.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  
  
  
  
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>



</head>



<!-- <table width="704" border="1" align="center" cellpadding="0" cellspacing="0" >
<td>
    <tr>
      <td> <img src="images/logo.png" width="100" height="100"></td>
    </tr>



</td>

<td>

    <tr>  
      <td width="291" align="center"><span class="style2">แบบขอใช้บริการผลิตสื่โสตทัศน์</span></td>
    </tr>
    <tr>  
        <td height="27" align="center"><span class="style2">ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</span></td>
    </tr>
    <tr>    
        <td height="25" align="center"><span class="style2">โทรศัพท์ : 0-4422-4994    โทรสาร : 0-4422-4974</span></td>
    </tr>
    <tr>
        <td height="25" align="center"><span class="style2">http://ceit.sut.ac.th/</span></td>
    </tr>

</td>

</table> -->
<body style="font-family: serif;">



<table  cellpadding="0" cellspacing="0" width="1000" height="100">
       <tr> 
              <td border="0" rowspan="5"  align="center" width="150">
                <img src="images/logo.png" width="100" height="100">
              </td>
             
       </tr>
       <tr> 
              
              <td border="0" align="center" height="100"  width="300">
                แบบขอใช้บริการผลิตสื่อโสตทัศน์<br><br>
                ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา<br><br>
                โทรศัพท์ : 0-4422-4994    โทรสาร : 0-4422-4974<br><br>
                http://ceit.sut.ac.th<br>
              </td>
              <td border="1" rowspan="5" height="100" width="150" ><font size="2">
                &emsp;&emsp;เลขที่&emsp;&emsp;<?php echo $serid ?><br><br>
                &emsp;&emsp;วันที่&emsp;&emsp;<?php echo $requestDate ?><br><br>
                &emsp;&emsp;เวลา&emsp;&emsp;<?php echo $time ?>&emsp;&emsp;น.

                </font>
              </td>
       </tr>
       
       

  </table>






<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" width="100%">_________________________________________________________________________________________________________</td>
    </tr>
  </tbody>
</table><br>


<!-- <table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" >&nbsp;</td>
    </tr>
  </tbody>
</table> -->

<table width="230" border="0"  border="1" class="style2" cellpadding="0" cellspacing="0" bgcolor="#D5D5D5">
  <tbody>
    <tr>
      <td align="center" height="35">ส่วนที่ 1 : สำหรับผู้ขอใช้บริการ</td>     
    </tr>
  </tbody>
</table>

<table border="0"  border="0" class="style2" cellpadding="0" cellspacing="0" >
  <tbody>
    <tr>
      <td height="35"><font size="3">ชื่อ-นามสกุล&emsp;<?php echo $name ?>&emsp;&emsp;&emsp;&emsp;
        รหัสพนักงาน&emsp;<?php echo $employee_id; ?>&emsp;&emsp;&emsp;&emsp;
        หน่วยงาน&emsp;<?php echo $department; ?> </font></td>       
    </tr>
     <tr>
      <td height="30"><font size="3">โทรศัพท์&emsp;<?php echo $telno; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        มือถือ&emsp;<?php echo $phone; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        อีเมล&emsp;<?php echo $email; ?></font></td>

    </tr>
     <tr>
      <td height="30"><font size="3">ต้องการขอใช้บริการสื่อโสตทัศน์ในวันที่&emsp;<?php echo $date; ?>&emsp;&emsp;
        เวลา&emsp;<?php echo $time; ?>&emsp;น.&emsp;&emsp;
        สถานที่&emsp;<?php echo $serviceLocation; ?></font></td> 
    </tr>
    <tr>
      <td height="30"><font size="3">ต้องการรับผลงานในวันที่&emsp;<?php echo $recieveDate; ?></fon></td><br>
    </tr>
  </tbody>
</table>

<?php 

    if( $serviceType == "publicRelation"){
          $subjectCode="...................";
          $subjectName="...................";
    }


?>


<table width="800" border="1" class="style2" cellpadding="0" cellspacing="0" bgcolor="#D5D5D5">
  <tbody>
    <tr>
      <td align="center" height="50" width="50%"><font size="3">
        เพื่อการเรียนการสอน<br>
        รหัสวิชา&nbsp;<?php echo $subjectCode; ?>&nbsp;&nbsp;&nbsp;ชื่อวิชา&nbsp;<?php echo $subjectName; ?>
        </font>
      </td>
      <td align="center" height="50" width="50%"><font size="3">
        &emsp;&emsp;&emsp;&emsp;เพื่อการประชาสัมพันธ์&emsp;&emsp;&emsp;
        </font>
      </td><br>     
    </tr>
  </tbody>
</table><br>

<table width="800" border="0" class="style2" cellpadding="0" cellspacing="0" >
  <tbody>
    <tr>
      <td height="20" width="50%"><font size="3">

  <?php if ( $serviceType == "education"){ ?>
        <?php echo $service1; ?>&nbsp; <?php echo $service2; ?>&nbsp; <?php echo $service3; ?>&nbsp; <?php echo $service4; ?>&nbsp;<br><br>
        สำเนาสื่อ จำนวน &nbsp;<?php echo $copyQty; ?>&nbsp;แผ่น<br><br>

        <u>หมายเหตุ</u> <br><br>
        *ผู้ขอใช้ต้องแจ้งความประสงค์ล่วงหน้า 5 วัน <br><br>
        *แนบฟอร์ม M-01, M-02
  <?php } ?>           

        <!-- <input type="checkbox" name="Learn"> ประกอบบทเรียน </input><br><br>
        <input type="checkbox" name="Learn"> บันทึกการสอนในห้องเรียน* ขนาด 300 ที่นั่งขึ้นไป </input><br><br>
        <input type="checkbox" name="Learn"> สื่อเสียง </input><br><br>
        <input type="checkbox" name="Learn"> ภาพนิ่ง </input><br><br>
        <input type="checkbox" name="Learn"> สำเนาสื่อ จำนวน.........แผ่น </input><br><br> -->
        
      </font>
      </td>
      <td height="20" width="50%"><font size="3">

        <?php if ( $serviceType == "publicRelation"){ ?>
        <?php echo $service1; ?>&nbsp; <?php echo $service2; ?>&nbsp; <?php echo $service3; ?>&nbsp; <?php echo $service4; ?>&nbsp;<br><br>
        
        สำเนาสื่อ จำนวน &nbsp;<?php echo $copyQty; ?>&nbsp;แผ่น<br><br>
        <?php } ?>    
        
        <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> สื่อวิดิทัศน์** </input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> สื่อเสียง </input><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ความยาวน้อยกว่า 1 นาที &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </input><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ความยาว 1 - 15 นาที </input><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ความยาว 5 - 15 นาที </input><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ข่าว* </input><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ภาพนิ่ง* </input><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> สำเนาสื่อ จำนวน.........แผ่น </input><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          -->
        </font>
      </td>
    </tr>
  </tbody>
</table>

<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" width="100%" height="10">_________________________________________________________________________________________________________</td>
    </tr>
  </tbody>
</table>


<table width="800" border="0" >
  <tbody>
    <tr>
      <td height="25"><font size="3">
       
        <?php if ( $freeLance == '1'){ ?>
        <?php echo "งานส่วนตัว/งานภายนอก ผู้ขอใช้บริการและชำระเงินคือ " ?>&emsp;<?php echo $whoPay; ?><br><br>
        <?php } ?>    

        
      </font>
    </td><br>
    </tr>
    <tr>
      <td height="25" width="100%"><font size="3">
        ลักษณะงานที่ต้องการโดยสังเขป : <?php echo $workDes; ?><br><br>
    </tr>
    <!-- <tr>
      <td height="25"><font size="3">.....................................................................................................................................................................</font></td><br>
    </tr> -->
  </tbody>
</table><br>


<table width="800" border="0" class="style2" cellpadding="0" cellspacing="0" >
  <tbody>
    <tr>
      <td align="center" height="50" width="50%"><font size="2">
        &emsp;&emsp;&emsp;&emsp;ลงชื่อ..........................................ผู้ขอใช้บริการ<br><br>
        (..........................................)<br><br>
        ............/................/..............  <br><br>
        <br><br>

        </font>
      </td>
      <td align="center" height="50" width="50%"><font size="2">
        &emsp;&emsp;ลงชื่อ..........................................ผู้รับรอง<br><br>
        (..........................................)<br><br>
        หัวหน้าหน่วยงาน(คณบดีหรือเทียบเท่า)<br><br>
        ............/................/..............

        </font>
      </td>    
    </tr>
  </tbody>
</table>

<!-- <table border="0"  border="0" class="style2" cellpadding="0" cellspacing="0"  >
  <tbody>
    <tr>
      <td height="20"><font size="3">&emsp;&emsp;&emsp;&emsp;&emsp;ลงชื่อ................................ผู้ขอใช้บริการ
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ลงชื่อ................................ผู้รับรอง</font></td>       
    </tr>
     <tr>
      <td height="20"><font size="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(..........................................)
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(..........................................)</font></td>
    </tr>
     <tr>
      <td height="20"><font size="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;............/................/..............                
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;หัวหน้าหน่วยงาน(คณบดีหรือเทียบเท่า)</font></td>
    </tr>
    <tr>
      <td height="20"><font size="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;............/................/..............</font></td><br>
    </tr>
  </tbody>
</table> -->

<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" width="100%" >_________________________________________________________________________________________________________</td>
    </tr>
  </tbody>
</table><br>

<table width="230" border="1" class="style2" cellpadding="0" cellspacing="0" bgcolor="#D5D5D5">
  <tbody>
    <tr>
      <td align="center" height="35">ส่วนที่ 2 : สำหรับเจ้าหน้าที่</td>     
    </tr>
  </tbody>
</table><br>

<table width="800" border="0" class="style2" cellpadding="0" cellspacing="0" >
  <tbody>
    <tr>
      <td height="50" width="50%"><font size="2">
        (1) เรียน&emsp;<?php echo $name ?><br><br>
        &emsp;&emsp;&emsp;&emsp;<input type="checkbox" name="Learn"> เพื่อโปรดดำเนินการ </input><br><br>
        &emsp;&emsp;&emsp;&emsp;<input type="checkbox" name="Learn"> ไม่สามารถให้บริการได้ (แจ้งผู้ขอใช้บริการ) </input><br><br>
         เนื่องจาก........................................................................................  
        <br><br>
        <br><br>        
        &emsp;&emsp;&emsp;&emsp;ลงชื่อ........................................................<br><br>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(&emsp;นายวันชัย น้อยมะโน&emsp;)<br><br>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;หัวหน้าฝ่ายผลิตสื่อโสตทัศน์<br><br>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;............/................/..............  <br><br>


        </font>
      </td>
      <td height="50" width="50%"><font size="2">
        &emsp;&emsp;(2) ผู้ปฏิบัติงานส่งผลงาน<br><br>
        &emsp;&emsp;&emsp;&emsp;<input type="checkbox" name="Learn"> วิดิทัศน์</input>
        &emsp;&emsp;&emsp;&emsp;<input type="checkbox" name="Learn"> ภาพนิ่ง </input>
        &emsp;&emsp;&emsp;&emsp;<input type="checkbox" name="Learn"> สื่อเสียง</input><br><br>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ลงชื่อ..........................................ผู้ปฏิบัติงาน<br><br>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;............/................/..............<br><br>
        &emsp;&emsp;&emsp;&emsp;ส่งผลงานให้ผู้ขอใช้บริการวันที่.................................<br><br>
        &emsp;&emsp;&emsp;&emsp;<input type="checkbox" name="Learn"> รับด้วยตนเอง </input>
        &emsp;&emsp;&emsp;&emsp;<input type="checkbox" name="Learn"> ส่งทางเมล สสน.</input><br><br>
        &emsp;&emsp;&emsp;&emsp;<input type="checkbox" name="Learn"> อื่นๆ............................................</input><br><br>
        &emsp;&emsp;&emsp;&emsp;คีย์ข้อมูลลงระบบแล้ว วันที่............/................/..............<br><br>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ลงชื่อ..........................................


        </font>
      </td>    
    </tr>
  </tbody>
</table>

 

    <!-- container -->
  <!-- <div class="form-horizontal" style="margin-top:-2%"> -->
    <!-- <p class="col-sm-12">  <label class="col-sm-2">หมายเลขเอกสาร :</label><span class="col-sm-2"> </span> </p> -->
    <!--  <p class="col-sm-12">  <label class="col-sm-5">เวลา :</label><span class="col-sm-2"> <input type="text" class="form-control" readonly="true" id="time" /></span> </p>
     <p class="col-sm-12">  <label class="col-sm-2">วันที่ขอใช้งาน :</label><span class="col-sm-2"> <input type="text" class="form-control" readonly="true" id="date" /></span> </p>
    <p class="col-sm-12">  <label class="col-sm-2">สถานที่ :</label><span class="col-sm-4"> <input type="text" class="form-control" readonly="true" id="serviceLocation" /></span> </p>
    <p class="col-sm-12">  <label class="col-sm-2">ลักษณะงาน :</label><span class="col-sm-4"> <input type="text" class="form-control" readonly="true" id="serviceType" /></span> </p>
  </div>

   <p class="col-sm-12">  <label class="col-sm-2">งานประเภท :</label><span class="col-sm-4"> <input type="text" class="form-control" readonly="true" id="workDetail" /></span> </p>
    <p class="col-sm-12">  <label class="col-sm-2">สำนวนสื่อจำนวน :</label><span class="col-sm-1"> <input type="text" class="form-control" readonly="true" id="copyQty" /></span><label>แผ่น</label> </p>
    <p class="col-sm-12">  <label class="col-sm-2">งานส่วนตัว :</label><span class="col-sm-1"> <input type="text" class="form-control" readonly="true" /></span><label class="col-sm-1" style="text-align:right">ผู้ชำระเงิน :</label><span class="col-sm-2"><input type="text" class="form-control"  readonly="true" /></span> </p>
      <p class="col-sm-12">  <label class="col-sm-2">ลักษณะงานพอสังเขป :</label><span class="col-sm-5"> <textarea class="form-control" readonly="true" id="descript"></textarea></span></p>
   -->
  


<!-- end container -->
  <!-- </div>  -->

</body>
</html>

<?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>     
<!-- ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a> -->