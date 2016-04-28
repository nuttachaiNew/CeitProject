<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/master.css">
  <link rel="stylesheet" type="text/css" href="css/datepicker.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  
  
  
  
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>

<?php session_start();

  if(!isset($_SESSION['UserID'])){
    header("location:Login.html");
  }
?>
</head>
<body>

<?php 

if($_SESSION["Status"]=="User"){
  echo '

  <nav class="navbar navbar-default" style="background-color:#23282e; height:50px;" id="nav"  >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <div class="brand"><image src="images/brand.png" id="pic"></div>
    <!-- <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i> -->
      </a>
    </div>
  </div>
      <div class="nav-side-menu" style="display:none;" id="mainMenu" >
  
        <div class="menu-list">
            <div class="brand" id="navlogo"><image src="images/brand.png"></div>
           <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
            <ul id="menu-content" class="menu-content collapse out">
                <li >
                  <a href="#">
                  <i class="fa fa-home fa-lg"></i> Home
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service7" class="collapsed">
                  <a href="#"><i class="fa fa-list fa-lg"></i> CEIT Service <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service7">
                    <li class="active" ><a href="serviceClient.php" >ขอใช้บริการผลิตสื่อโสตทัศน์</a></li>
                    <!-- <li><a href="#">อื่นๆ</a></li> -->
                </ul>
                 <li>
                  <a href="Profile.php">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="Login.html">
                  <i class="fa fa-power-off fa-lg"></i> Sign Out
                  </a>
                </li>
            </ul>
     </div>
</div>
</nav>    ';
}else if($_SESSION["Status"]=="Approver"){
    echo '
  <nav class="navbar navbar-default" style="background-color:#23282e; height:50px;" id="nav"  >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >
        <div class="brand"><image src="images/brand.png" id="pic"></div>
    <!-- <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i> -->
      </a>
    </div>
  </div>
      <div class="nav-side-menu" style="display:none;" id="mainMenu" >
  
        <div class="menu-list">
            <div class="brand" id="navlogo"><image src="images/brand.png"></div>
           <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
            <ul id="menu-content" class="menu-content collapse out">
                <li >
                   <a href="calendar.php">
                  <i class="fa fa-home fa-lg"></i> ตารางการทำงาน
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service" class="collapsed">
                  <a><i class="fa fa-list fa-lg"></i> เมนูของผู้จัดการ <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li  ><a href="authorize.php" >สถานะงานทั้งหมด</a></li>
                    <li><a href="report.php">รายงานการดำเนินงาน</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                      <li><a href="evaluateReport.php">ผลการประเมินการให้บริการ</a></li>
                      <li><a href="summary.php">สถิติการขอใช้งาน</a></li>
                </ul>

                    <li  data-toggle="collapse" data-target="#service1" class="collapsed">
                  <a href="#"><i class="fa fa-list fa-lg"></i>เมนูของพนักงาน<span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service1">
                    <li ><a href="employee.php" >สถานะงานของพนักงาน</a></li>
                    <!-- <li><a href="#">อื่นๆ</a></li> -->
                </ul>
                 <li  data-toggle="collapse" data-target="#service2" class="collapsed">
                  <a ><i class="fa fa-list fa-lg"></i> CEIT Service <span class="arrow"></span></a>
                </li>
                  <ul class="sub-menu collapse" id="service2">
                    <li  ><a href="serviceClient.php" >ขอใช้บริการผลิตสื่อโสตทัศน์</a></li>
                   
                </ul>
                 <li id="logout">
                  <a href="Login.html">
                  <i class="fa fa-power-off fa-lg"></i> ออกจากระบบ
                  </a>
                </li>
            </ul>
     </div>
</div>


</nav>';
}


?>
<!-- menu -->
<!-- head menu -->
<div class="container">
  <div class="form-horizontal">
     <div class="form-horizontal" role="form">
                    <ol class="breadcrumb">
                         <li> CEIT Service </li>
                         <li>ขอใช้บริการผลิตสื่อโสตทัศน์</li>
                          <li class="active">รายละเอียดการขอบริการ</li>
                    </ol>
            </div>
  </div>  
<?php

 ?>
<!-- container -->
  <div class="form-horizontal" style="margin-top:1%">
    <p class="col-sm-12">  <label class="col-sm-2">หมายเลขเอกสาร :</label><span class="col-sm-2"> <input type="text" class="form-control" readonly="true"  id="serviceID" /></span> </p>
     <p class="col-sm-12">  <label class="col-sm-2">เวลา :</label><span class="col-sm-2"> <input type="text" class="form-control" readonly="true" id="time" /></span> </p>
     <p class="col-sm-12">  <label class="col-sm-2">วันที่ขอใช้งาน :</label><span class="col-sm-2"> <input type="text" class="form-control" readonly="true" id="date" /></span> <label class="col-sm-1">วันที่รับงาน:</label><span class="col-sm-2"> <input type="text" class="form-control" readonly="true" id="recieveDate" /></span></p>
    <p class="col-sm-12">  <label class="col-sm-2">สถานที่ :</label><span class="col-sm-4"> <input type="text" class="form-control" readonly="true" id="serviceLocation" /></span> </p>
    <p class="col-sm-12">  <label class="col-sm-2">ลักษณะงาน :</label><span class="col-sm-4"> <input type="text" class="form-control" readonly="true" id="serviceType" /></span> </p>
  </div>
   <p class="col-sm-12">  <label class="col-sm-2">งานประเภท :</label><span class="col-sm-4"> <input type="text" class="form-control" readonly="true" id="workDetail" /></span> </p>
    <p class="col-sm-12">  <label class="col-sm-2">สำนวนสื่อจำนวน :</label><span class="col-sm-1"> <input type="text" class="form-control" readonly="true" id="copyQty" /></span><label>แผ่น</label> </p>
    <p class="col-sm-12">  <label class="col-sm-2">งานส่วนตัว :</label><span class="col-sm-1"> <input type="text" class="form-control" id="freeLance" readonly="true" /></span><label class="col-sm-1" style="text-align:right">ผู้ชำระเงิน :</label><span class="col-sm-2"><input type="text" class="form-control"  id="whoPay" readonly="true" /></span> </p>
      <p class="col-sm-12">  <label class="col-sm-2">ลักษณะงานพอสังเขป :</label><span class="col-sm-5"> <textarea class="form-control" readonly="true" id="descript"></textarea></span></p>
  
  


<!-- end container -->
  </div> 

   <div class="form-horizontal border" style="margin-top:2%;">
   <div style="margin-top:2%">
     <center >
       <button id="approve" class="btn btn-sm btn-success" data-toggle="modal" data-target="#approveModal" style="display:none;"><span class="fa fa-check-square-o  fa-md"> อนุมัติ</span></button>  
     
     <?php if($_SESSION['Status']=="User"){
      echo "<a href='serviceClient.php' class='btn btn-danger'><i class='fa fa-reply'>ย้อนกลับ</i></a>" ;
     }else if($_SESSION['Status']=="Employee"){
      echo "<a href='employee.php' class='btn btn-danger'><i class='fa fa-reply'>ย้อนกลับ</i></a>" ;
    }else if($_SESSION['Status']=="Approver"){
      echo "<a href='authorize.php' class='btn btn-danger'><i class='fa fa-reply'>ย้อนกลับ</i></a>" ;
    }
     
     ?>

      <a href="exportpdf.php" target="_blank" class="btn btn-info" title="พิมพ์ใบขอใช้บริการ" id="print" style="display:none;"><i class="fa fa-print">พิมพ์</i></a> 
      <button id="edit" class="btn btn-warning" style="display:none;"><span class='fa fa-pencil-square-o'>แก้ไข</span></button>
      <button id="save" class="btn btn-primary" style="display:none;"><span class='fa fa-floppy-o'>บันทึก</span></button>
     
     </center>
    </div>
  </div>

  



</div>

<div class="modal fade" id="approveModal" name="Add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <h4 class="modal-title">อนุมัติงาน</h4>
                </div>
                <div class="modal-body border">
                    <!--===============================================-->
                   <br/><span class="col-sm-2"></span>
                        <label>ตัวชี้วัด 1 <span style=" color: red;">*</span>:</label> 
                        <select id="ind1"   >
                            <option value="0"></option>
                        <?php
                              include("php/config.php");
                              $result = mysqli_query($Connection,"SELECT * FROM indicators");
                              while($row =  mysqli_fetch_array($result)){
                                 echo "<option value='".$row['indicatorID']."'>".$row['indicatorID']." : ".$row['indicatorName']."</option>";
                              }
                     
                          ?>
                          
                        </select > 

                        <br/><span class="col-sm-2"></span>
                         <label>ตัวชี้วัด 2 :</label> 
                        <select id="ind2">
                            <option value="0"></option>
                         <?php
                              // include("php/config.php");
                              $result = mysqli_query($Connection,"SELECT * FROM indicators");
                              while($row =  mysqli_fetch_array($result)){
                                 echo "<option value='".$row['indicatorID']."'>".$row['indicatorID']." : ".$row['indicatorName']."</option>";
                              }
                     
                          ?>

                        </select> <br/>
                        <span class="col-sm-3"></span>
                        <label>อนุมัติงานให้ 1<span style=" color: red;">*</span> :</label> 
                        <select id="emp1" data-toggle="popover2" data-placement="bottom" data-content="กรุณากรอกช่องนี้" >
                            <option value="0"></option>
                              <?php
                              $result = mysqli_query($Connection,"SELECT * FROM employee");
                              while($row =  mysqli_fetch_array($result)){
                                 echo "<option value='".$row['empID']."'>".$row['empID']." : ".$row['empName']."</option>";
                              }
                     
                          ?>
                        </select> <br/>
                         <span class="col-sm-3"></span>
                        <label>อนุมัติงานให้ 2 :</label> 
                        <select id="emp2">
                           <option value="0"></option>
                              <?php
                              $result = mysqli_query($Connection,"SELECT * FROM employee");
                              while($row =  mysqli_fetch_array($result)){
                                 echo "<option value='".$row['empID']."'>".$row['empID']." : ".$row['empName']."</option>";
                              }
                     
                          ?>
                        </select> <br/>
                      <span class="col-sm-3"></span>
                        <label>อนุมัติงานให้ 3 :</label> 
                        <select id="emp3">
                           <option value="0"></option>
                              <?php
                              $result = mysqli_query($Connection,"SELECT * FROM employee");
                              while($row =  mysqli_fetch_array($result)){
                                 echo "<option value='".$row['empID']."'>".$row['empID']." : ".$row['empName']."</option>";
                              }
                     
                          ?>
                        </select> <br/>
                        
                          
                </div>
                <div class="modal-footer border">
                    <center>
                      <label>ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</label><br/>
                      <label>โทรศัพท์ : 0-4422-4994 โทรสาร : 0-4422-4974</label><br/>
                      <label><a href="http://ceit.sut.ac.th">ceit.sut.ac.th</a></label><br/>
                    <br/>    <button id="approveConfirm" type="button"  class="btn btn-sm btn-primary" data-toggle="popover1" data-placement="bottom" data-content="กรุณาข้อมูลที่กำหนด">อนุมัติงาน</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </center>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal-->


</body>
<script src="js/seviceDetail.js"></script>
<script src="js/event.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {  
  getPosition();
});
  function getPosition(){
    // console.log(sta)
  var user = '<?php echo $_SESSION["UserID"] ;?>';
  $.ajax({
           type: "GET",
           url: "php/position.php",
           cache: false,
           data: "UserID="+user,
           success: function(msg){
              if(msg=="1" && sta=="waiting"){
                $("#approve").show()

              }
          }
         });
}


</script>
</html>




