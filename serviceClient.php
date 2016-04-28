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
<!--  -->
  <script type="text/javascript" src="jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />

  

  <script type="text/javascript" src="lib/site.js"></script>
  <link rel="stylesheet" type="text/css" href="lib/site.css" />


    <?php
      session_start();
      if(!isset($_SESSION["UserID"])){
          // echo "test";
          header("location:Login.html");
      }
    ?>
</head>
<body>
<?php

if($_SESSION['Status']=='User'){
echo ' 
  <nav class="navbar navbar-default" style="background-color:#23282e; height:50px;" id="nav"  >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">
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
                  <i class="fa fa-home fa-lg"></i> Home
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service7" class="collapsed">
                  <a ><i class="fa fa-list fa-lg"></i> CEIT Service <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service7">
                    <li class="active" ><a href="serviceClient.php" >ขอใช้บริการผลิตสื่อโสตทัศน์</a></li>
                     <li><a href="evaluateTools.php" >ประเมินความพึงพอใจในการให้บริการ</a></li>
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
                    <li class="active" ><a href="serviceClient.php" >ขอใช้บริการผลิตสื่อโสตทัศน์</a></li>
                   
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
                         <li class="active">ขอใช้บริการผลิตสื่อโสตทัศน์</li>
                    </ol>
            </div>
  </div>  

<!-- container -->
<div class="form-horizontal" style="margin-top:2%">
     <div class="panel panel-default" id="criteria">
             <div class="panel-heading">
                 <h4 class="panel-title">
                     <h2 class="panel-title"><a id="collapse" data-toggle="collapse" href="#collapse1">
                         <span id="caretdown" class="fa fa-caret-up"></span>
                     </a></h2>
                 </h4>
             </div>
             <div id="collapse1" class="panel-collapse in" >
              <div class="panel-body">
                  <div class="form-group">
                    <div class="col-sm-4">
                      
                    </div>
                <!--    
                    <div class="form-group col-sm-3">
                      <select id="type" class="form-control" style="text-align:center">
                        <option>เพื่อการเรียนการสอน</option>
                        <option>เพื่อการประชาสัมพันธ์</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <button id="search" class="btn btn-success" title="ค้นหา"><span class="fa fa-search fa-md" ></span></button>
                    </div> -->
                  </div>
               </div>
            </div>
         </div>

</div>

<div class="row" style="margin-top:1%">
   <button id="addParameterDetail" class="btn btn-sm btn-primary pull-left" data-toggle="modal" data-target="#addDetailModal"><span class="fa fa-plus" > เพิ่มบริการ</span></button>
</div>
<div class="row">
<div class="form-horizontal col-sm-9" style="margin-top:1%" id="tableScrollingY">
  <table class="table table-responsive">
    <thead>
      <tr>
        <th class="th">ข้อมูล</th>
        <th class="th">ประเภทการใช้งาน</th>
        <th class="th">สถานที่ปฏิบัติงาน</th>
        <th class="th">วันที่ขอใช้งาน</th>
        <th class="th">สถานะงาน</th>
          <th class="th">ติดตามงาน</th>
        <!-- <th class="th"></th> -->
      </tr>
    </thead>
    <tbody id="dataGrid">
 
       <?php
           
       // 
      if (isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
          // echo"login pass";
            include("php/config.php");
              $status="created";
              $sql = mysqli_query($Connection,"SELECT * FROM educationservice WHERE username LIKE  '".$_SESSION['UserID']."' ORDER BY requestDate desc");
              // $sql = mysql_query("SELECT * FROM educationservice WHERE username like '".$_SESSION['UserID']. "' ORDER BY date desc");
             
                while($row = mysqli_fetch_array($sql)){
                  echo "<tr>";
                       echo "<td align='center'><a href='serviceDetails.php?id=".$row["serviceID"]."' class='btn btn-warning' id='".$row["serviceID"]."'><span class='fa fa-file-text-o'></span></a></td>"; 
                    if($row["serviceType"]=="education"){

                       echo "<td align='left'>เพื่อการเรียนการสอน</td>";
                    
                    }else if($row["serviceType"]=="publicRelation"){
                       echo "<td align='left'>เพื่อการประชาสัมพันธ์</td>";
                      
                    }
                       echo "<td align='left'>".$row["serviceLocation"]."</td>";
                       echo "<td align='center'>".$row["date"]."</td>";
                       echo "<td align='center'><label class='label label-default' id='status".$row["serviceID"]."'>".$row["serviceStatus"]."</label></td>";
                         echo "<td align='center'><a class='fa fa-hand-pointer-o' href='customerTracking.php?id=".$row["serviceID"]."'></a></td>";
                      
                       // echo " <td align='center'><a href='serviceDetail.html' class='btn btn-warning' title='รายละเอียดงาน''><span class='fa fa-file-text-o'></span></a></td>";
                  echo "</tr>";
                }
              }else{
                echo "Please Login!";
              }

        ?>
<!--      <tr>
        
        <td align="center"><button class="btn btn-default" data-toggle="modal" data-target="#addDetailModal"><span class="fa fa-pencil"></span></button></td>
        <td align="center">เพื่อการเรียนการสอน</td>
        <td align="center">สื่อเสี่ยง</td>
        <td align="center">30 พฤศจิกายน 2558</td>
        <td align="center">รออนุมัติ</td>
        <td align="center"><a href="serviceDetail.html" class="btn btn-warning" title="รายละเอียดงาน"><span class="fa fa-file-text-o "></span></a></td>
      </tr> --> 

        </tbody>
    </table>
  


  </div>
  <div class="col-sm-3" id="alertNewWork"> 
        <div class="list-group">
  <a href="#" class="list-group-item active" style="text-align:right">
   สถานะงาน
  </a>
  <a href="#" class="list-group-item">งานที่สร้างใหม่ <span class="badge"><p class="newwork">0</p></span> </a>
</div>
  </div>
 
 </div>
 <div class="row">
         <div class="alert alert-success" role="alert" id="complete">
          <a href="#" class="alert-link">เพิ่มบริการสำเร็จ...กรุณาปริ้นท์เอกสารเพื่อยื่นต่อศูนย์นวัตกรรม</a>
        </div>
 </div>
  

</div>   <!--container -->

<!-- modal -->

<div class="modal fade" id="addDetailModal" name="Add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <h4 class="modal-title">แบบขอใช้บริการผลิตสื่อโสตทัศน์</h4>
                </div>
                <div class="modal-body border">
                    <!--===============================================-->
                    <div class="row">
                        <div class="form-horizontal col-sm-12">
                          <div class="form-group">
                            <div class="col-sm-3"></div>
                            <label class="col-sm-3">วันที่ใช้บริการ <span style=" color: red;">*</span>:</label> 
                            <!-- datepicker -->
                              &nbsp;<input class="datepicker" type="text" id="date" readonly ="true"  />
                          </div>
                          <div class="form-group">
                            <div class="col-sm-3"></div>
                            <label class="col-sm-2">เวลา <span style=" color: red;">*</span>:</label> <span class="col-sm-1"></span>
                          
                              <span class="col-sm-2"><input id="time" type="text" class="time" /></span>
                           <!-- <p> </p> -->
                           <!--  -->
                             <script>
                $(function() {
                    $('#time').timepicker({ 'timeFormat': 'H:i:s'

                     , 'disableTimeRanges': [
                              ['0am', '8am'],
                              ['7pm', '11.50:pm']
                          ]
                     });

                    // $('#timeformatExample2').timepicker({ 'timeFormat': 'h:i A' });
                });
            </script>
                          </div>
                            <div class="form-group">
                            <div class="col-sm-3"></div>
                            <label class="col-sm-3">รับผลงานวันที่<span style=" color: red;">*</span>:</label> 
                            <!-- datepicker -->
                                &nbsp;<input class="datepicker" type="text" id="recieveDate"  readonly ="true"  />
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-3"></div>
                            <label class="col-sm-2">สถานที่ <span style=" color: red;">*</span>:</label> 
                          <span class="col-sm-1"></span>
                              <span class="col-sm-4"><input class="form-control" type="text" id="location" /></span>
                            
                          </div>

                           <div class="form-group">
                              <div class="col-sm-3"></div>
                            <label  class="col-sm-3">ลักษณะงาน<span style=" color: red;">*</span>: </label>
                        &nbsp;
                            <select id="addType">
                              <option value="0">กรุณาเลือกประเภท</option>
                              <option value="education">เพื่อการเรียนการสอน</option>
                              <option value="publicRelation">เพื่อการประชาสัมพันธ์</option>
                            </select>&nbsp;&nbsp;&nbsp;
                          </div>
                        </div>
                        <div class="form-horizontal col-sm-12" id="serviceDetail">

                        </div>

                    </div>
                </div>
                <div class="modal-footer border">
                    <center>
                      <label>ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</label><br/>
                      <label>โทรศัพท์ : 0-4422-4994 โทรสาร : 0-4422-4974</label><br/>
                      <label><a href="http://ceit.sut.ac.th">ceit.sut.ac.th</a></label><br/>
                    <br/>    <button id="addDataDetail" type="button" data-toggle="popover" data-placement="bottom" data-content="กรุณากรอกข้อมูลให้ครบถ้วน" class="btn btn-sm btn-primary">เพิ่มบริการ</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </center>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal-->

 
    <div id="resultModal" aria-hidden="true" aria-labelledby="mySmallModalLabel" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!--<div class="modal-header">
                    <label>${}</label>
                </div>-->
                <div class="modal-body">
                    <div style="cursor:default">
                        <center><label id="message">เพิ่มบริการสำเร็จ</label></center>
                    </div>
                </div>
                <div class="modal-footer border">
                    <center><button  class="btn btn-success" style="margin:10px" data-dismiss="modal" id="confirm" >ตกลง</button>
                    </center>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
<script src="js/event.js"></script>
<script src="js/seviceClient.js"></script>

<script type="text/javascript">
  username = '<?php echo $_SESSION["UserID"] ;?>';
  

  var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST","php/newWork.php",false);
    param="id="+username;
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.setRequestHeader("Content-length", param.length);
    xmlHttp.setRequestHeader("Connection", "close");
    xmlHttp.send(param);
   
    var qty =parseInt(xmlHttp.responseText);
    if(qty<0){
        $("#alertNewWork").hide()     
    }else{
        $("#alertNewWork").show()         
    }

    $(".newwork").text(qty);

        
        function test(){
          a