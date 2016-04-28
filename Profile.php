<?php

          session_start();
          if($_SESSION['UserID'] == "")
          {
            echo "กรุณา Login!";
            exit();
          }
           

            include("php/config.php");  

            $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['UserID']."' ";
            $objQuery = mysqli_query($Connection,$strSQL);
            $objResult = mysqli_fetch_array($objQuery);


            if($objResult["img"] == null)
            {

              $img="images/avatar_3x.png";

            }else{

              $img="images/".$_SESSION['UserID'].".jpg";

            }


            

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">



    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>


<title>Profile CEIT</title>
</head>

<body>


    <?php 

if($_SESSION['Status']=="Employee"){
  echo '<nav class="navbar navbar-default" style="background-color:#23282e; height:50px;" id="nav"  >
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
                  <a href="calendar.php">
                  <i class="fa fa-calendar-check-o fa-lg"></i> ตารางการทำงาน
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-list fa-lg"></i> เมนูของพนักงาน <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li class="active" ><a href="#" >สถานะงานของพนักงาน</a></li>
                    <!-- <li><a href="#">อื่นๆ</a></li> -->
                </ul>
                 <li>
                  <a href="Profile.php">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li id="logout">
                  <a href="Login.html">
                  <i class="fa fa-power-off fa-lg"></i> ออกจากระบบ
                  </a>
                </li>
            </ul>
     </div>
</div>


</nav>';
}else if($_SESSION['Status']=="Approver"){

  echo '<nav class="navbar navbar-default" style="background-color:#23282e; height:50px;" id="nav"  >
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
                  <i class="fa fa-calendar-check-o fa-lg"></i> ตารางการทำงาน
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service" class="collapsed">
                  <a><i class="fa fa-list fa-lg"></i> เมนูผู้จัดการ  <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li class="active" ><a href="authorize.php" >สถานะงานทั้งหมด</a></li>
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
}else if($_SESSION['Status']=="User"){

  echo '<nav class="navbar navbar-default" style="background-color:#23282e; height:50px;" id="nav"  >
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

                <li  data-toggle="collapse" data-target="#service" class="collapsed">
                  <a ><i class="fa fa-list fa-lg"></i> CEIT Service <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li><a href="serviceClient.php" >ขอใช้บริการผลิตสื่อโสตทัศน์</a></li>
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


</nav>';
}else if($_SESSION['Status']=="Admin"){

  echo '<nav class="navbar navbar-default" style="background-color:#23282e; height:50px;" id="nav"  >
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
                  <a href="userdetail.php">
                  <i class="fa fa-home fa-lg"></i> Home
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-list fa-lg"></i> CEIT Service <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li><a href="userdetail.php" >จัดการข้อมูลลูกค้า</a></li>
                    <li><a href="Empdetail.php">จัดการข้อมูลพนักงาน</a></li>
                    <li><a href="indicatorsdetail.php">เพิ่มตัวชี้วัด</a></li>
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
                         <li class="active">จัดการข้อมูลส่วนตัว</li>                         
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
    
     
        <div class="col-xs-12 col-sm-12 col-sm-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-sm-offset-3 col-lg-offset-3 toppad" style="margin-top:1%">
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $objResult["name"]; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <!-- <div class="col-sm-3 col-lg-3 " align="center"> <img alt="User Pic" src="Images/avatar_3x.png" -->
                <div class="col-sm-3 col-lg-3" align="center" style="margin-top:2%"> 
                  <?php
                  echo "<img alt='No Image' src='".$img."' class='img-circle' width='100%' height='130px'>"; ?>
                
                   </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <p>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-sm-9 col-sm-9 "> 
                  <table class="table table-user-information">


                    <tr>
                        <td>รหัสผู้ใช้:</td>
                        <td><?php echo $objResult["username"]; ?></td>
                      </tr>

                    <tr>
                        <td>รหัสพนักงาน:</td>
                        <td><?php echo $objResult["employee_id"]; ?></td>
                      </tr>
                      <tr>
                        <td>ชื่อ-นามสกุล:</td>
                        <td><?php echo $objResult["name"]; ?></td>
                      </tr>
                      <tr>
                        <td>แผนก</td>
                        <td><?php echo $objResult["department"]; ?></td>
                      </tr>

                    <tbody>
                      
                   
                         <tr>
                             <tr>
                        <td>เบอร์โทรศัพท์</td>
                        <td><?php echo $objResult["telno"]; ?></td>
                      </tr>
                      </tr>

                       <tr>
                             <tr>
                        <td>เบอร์มือถือ</td>
                        <td><?php echo $objResult["phone"]; ?></td>
                      </tr>
                    </tr>




                      <tr>
                        <td>อีเมล</td>
                        <td><?php echo $objResult["email"]; ?></td>
                      </tr>
                       
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <!--<a href="#" class="btn btn-primary">ตรวจสอบรายละเอียดการทำงาน</a>
                  <a href="#" class="btn btn-primary">ตรวจสอบรายละเอียดการทำงาน</a>-->
                </div>
              </div>
            </div>
                 <!--<div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>-->
            
          </div>
        </div>
      </div>
    </div>

     </div> 

     <div class="container">
      <div class="row">
      <div class="col-sm-5  toppad  pull-right col-sm-offset-1 ">
        
          <!-- <br><a href='Editprofile.php'><button type="button" class="btn btn-sm btn-success pull-left">แก้ไขข้อมุล</button></a> -->
          <br><button type="button" class="btn btn-sm btn btn-warning" data-toggle='modal' data-target='#editprofile' ><span class='fa fa-pencil-square-o'> แก้ไขข้อมุล</span></button>
          <a href='#'><button type="button" class="btn btn-sm btn-danger" OnClick="back()">ย้อนกลับ</button></a>


          <!-- <A href="#" >Edit Profile</A> -->
          <!-- <A href="Login.html" >Logout</A> -->
       <br>
<!-- <p class=" text-info">May 05,2014,03:00 pm </p> -->
      </div>

      
<div class="container">
        <div class="row">
          <div class="col-sm-7 col-sm-offset-3">

          </div>
        </div>
        <div class="row">
        
</div>
        </div>



<!-- Modal -->
  <div class="modal fade" id="editprofile" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูลส่วนตัว</h4>
        </div>
        <div class="modal-body">

              <form role="form" action="saveEditprofile.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                                  <div class="col-sm-4"></div>
                                    <label for="username" class="col-sm-2 control-label">ชื่อผู้ใช้งาน</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $objResult["username"]; ?>" placeholder="ชื่อผู้ใช้งาน" readonly="true" required autofocus>
                                    </div>
                                </div>


                <div class="form-group">
                  <div class="col-sm-4"></div>
                    <label for="fullname" class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $objResult["name"]; ?>" placeholder="ชื่อ-นามสกุล" required autofocus>
                        </div>                
                </div>


                <div class="form-group">
                   <div class="col-sm-4"></div>
                                    <label for="employeecode" class="col-sm-2 control-label">รหัสพนักงาน</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="employeecode" name="employeecode" value="<?php echo $objResult["employee_id"]; ?>" placeholder="รหัสพนักงาน" required autofocus>
                                    </div>
                                </div>


                 <div class="form-group">
                    <div class="col-sm-4"></div>
                                     <label for="department" class="col-sm-2 control-label">แผนก/ฝ่าย</label>
                                    <div class="col-sm-4">
                                    <input type="text" id="department" name="department"  class="form-control" value="<?php echo $objResult["department"]; ?>" placeholder="แผนก/ฝ่าย" required autofocus>
                                                                                  
                                    </div>
                                </div>

                 

                                 <div class="form-group">
                                  <div class="col-sm-4"></div>
                                    <label for="telephone" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $objResult["telno"]; ?>" placeholder="เบอร์โทรศัพท์" required autofocus>
                                    </div>
                                </div>


                                 <div class="form-group">
                                  <div class="col-sm-4"></div>
                                    <label for="phone" class="col-sm-2 control-label">เบอร์มือถือ</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $objResult["phone"]; ?>" placeholder="เบอร์มือถือ" required autofocus>
                                    </div>
                                </div>



                  
                  
                           <div class="form-group">
                            <div class="col-sm-4"></div>
                                    <label for="email" class="col-sm-2 control-label">อีเมล</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $objResult["email"]; ?>" placeholder="ที่อยู่อีเมล" required autofocus>
                                    </div>
                                </div>

                                 
                                    
                                <div class="form-group">
                                  <div class="col-sm-4"></div>
                                    <label for="password" class="col-sm-2 control-label">รหัสผ่าน</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $objResult["password"]; ?>" placeholder="รหัสผ่าน" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-4"></div>
                                    <label for="pic" class="col-sm-2 control-label">อัพโหลดรูป</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="file"  id="pic" accept="image/*">
                                    </div>
                                </div><br/>            
  
   
        <div class="modal-footer">
                <!-- <label>ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</label>
                <br/>
                <label>โทรศัพท์ : 0-4422-4994 โทรสาร : 0-4422-4974</label>
                <br/>
                <label><a href="http://ceit.sut.ac.th">ceit.sut.ac.th</a></label> -->
                <br/><br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/><br/><br/> 
                <br/><button type="submit" class="btn btn-sm btn-primary">แก้ไข</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </form>        
        </div>
      </div>
      
    </div>
  </div>
  
</div>
   
   


</body>

<script src="js/event.js"></script>

<script type="text/javascript">
 
    $(function(){
              $('.datepicker').datepicker()
          });


    function back()
          {
        window.history.back();
          }
</script>




</html>