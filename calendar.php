<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ตารางงาน</title>
    <link rel="stylesheet" href="js/fullcalendar-2.1.1/fullcalendar.min.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/master.css">
  <link rel="stylesheet" type="text/css" href="css/datepicker.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  
  
  <?php 
    session_start();
  ?>
  
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <style type="text/css">

    html,body{
        maring:0;padding:0;
        font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;   
        font-size:12px;
    }
	#calendar{
	 max-width: 70%;
    margin: 0 auto;
        font-size:13px;
	}        
    </style>
</head>
<body>
<?php 

if($_SESSION["Status"]=="Employee"){
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
                  <a >
                  <i class="fa fa-calendar-check-o fa-lg"></i> ตารางการทำงาน
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service4" class="collapsed">
                  <a ><i class="fa fa-list fa-lg"></i>เมนูของพนักงาน<span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service4">
                    <li class="active" ><a href="employee.php">สถานะงานของพนักงาน</a></li>
                    <!-- <li><a href="#">อื่นๆ</a></li> -->
                </ul>
              
                 
                 <li>
                  <a href="Profile.php">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="Login.html">
                  <i class="fa fa-power-off fa-lg"></i> ออกจากระบบ
                  </a>
                </li>
            </ul>
     </div>
</div>


</nav>
';
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
                <li class="active">
                   <a href="calendar.php">
                  <i class="fa fa-calendar-check-o fa-lg"></i> ตารางการทำงาน
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


<br><br>
<!-- <div style="margin:auto;width:600px;"> -->
<div class="container">
<div class="row">
    <div class="col-sm-offset-5">
 </div>
</div>
<div class="row">
       <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-3">
                                    <i class="fa fa-bell fa-5x"></i>
                                </div>
                                <div class="col-sm-9 text-right">
                                    <div style=" font-size: 20px;">What's next?</div>
                                   <span class="pull-right" id="work">งาน :</span><br/>
                                    <span class="pull-right" id="dates">วันที่ :</span><br/>
                                    <span class="pull-right" id="times">เวลา :</span>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                          
                                <span class="pull-left" id="locate">สถานที่ :</span><br/>
                             
                                <div class="clearfix"></div>
                            </div>
                       
                    </div>
                    <div class="form-horizon" style="margin-top:5%">
                       <p style="background-color:#66FF33;"> งานที่สำเร็จ</p>
                        <p style="background-color:#F1C54D;">งานที่กำลังดำเนินการ</p>
                        <p style="background-color:#CCFFCC;">งานที่รอดำเนินการ</p>

                    </div>
                </div>
  <div id='calendar' class="col-sm-10"></div>
 <!-- </div> -->

   
</div>
</div>
  <div class="modal fade" id="showValue" name="Add">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <h4 class="modal-title">งานที่ต้องทำ</h4>
                </div>
                <div class="modal-body border">
                    <!--===============================================-->
                    <div class="row">
                            
                            <label>ผู้ขอใช้บริการ :</label><span id="user"></span><br/>
                            <label>เบอร์โทรติดต่อ :</label><span id="tel"></span><br/>
                            <label>วันที่ :</label><span id="date"></span><br/>
                            <label>เวลา :</label><span id="time"></span><br/>
                            <label>สถานที่ :</label><span id="serviceLocation"></span></br>
                            <label>งานที่ปฏิบัติ :</label><span id="workDescription"></span></br>
                            <label>ผู้ปฏิบัติงาน :</label><span id="emp1"></span></br>
                             <label>ผู้ปฏิบัติงาน :</label><span id="emp2"></span></br>
                            <label>ผู้ปฏิบัติงาน :</label><span id="emp3"></span></br></br>

                      <center>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                      </center>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal-->

    
   <script type="text/javascript">
   function reloadBody(){
  $("body").load("#working");
}

setTimeout("reloadBody();",30000);
</script> 
<script type="text/javascript" src="js/fullcalendar-2.1.1/lib/moment.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/lang/th.js"></script>
<script type="text/javascript" src="script.js"></script>            
<script src="js/event.js"></script>
</body>
</html>