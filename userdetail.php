<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/master.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/datepicker.css"> -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">

	
	
  
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>



    <?php
      session_start();

      if(!isset($_SESSION["UserID"])||$_SESSION['Status']!="Admin"){

        echo "<script>alert('คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้!');</script>";
        echo "<script>window.history.back();</script>"; 
        exit();

      }
      
    ?>
</head>
<body>



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
                  <a href="userdetail.php">
                  <i class="fa fa-home fa-lg"></i> Home
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-list fa-lg"></i> CEIT Service <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li class="active" ><a href="userdetail.php" >จัดการข้อมูลลูกค้า</a></li>
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


</nav>
<!-- menu -->
<!-- head menu -->
<div class="container">
	<div class="form-horizontal">
		 <div class="form-horizontal" role="form">
                    <ol class="breadcrumb">
                         <li> CEIT Service </li>
                         <li class="active">จัดการข้อมูลลูกค้า</li>
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
	 <!-- <button id="addParameterDetail" class="btn btn-sm btn-primary pull-left" data-toggle="modal" data-target="#addDetailModal"><span class="fa fa-floppy-o fa-lg" data-toggle="modal" data-target="#addDetailModal"> Add Service</span></button> -->
<!-- <a href='RegisterEmp.php'><button type="button" class="btn btn-sm btn-primary pull-left">เพิ่มข้อมูลลูกค้า</button></a> -->
</div>
<div class="row">
<div class="form-horizontal col-sm-12" style="margin-top:1%" id="tableScrollingY">
	<table class="table table-responsive">
		<thead>
			<tr>
				<th class="th">ชื่อ-นามสกุล</th>
				<th class="th">รหัสพนักงาน</th>
				<th class="th">แผนก</th>
				<th class="th">เบอร์โทรศัพท์</th>
        <th class="th">เบอร์เบอร์มือถือ</th>
				<th class="th">อีเมลล์</th>
        <th class="th">ชื่อผู้ใช้งาน</th>
        <th class="th">รหัสเข้าใช้งาน</th>
        <th class="th">สถานะ</th>
        <th class="th">แก้ไข</th>
        <th class="th">ลบ</th>
				<!-- <th class="th"></th> -->
			</tr>
		</thead>
		<tbody id="dataGrid">
 
       <?php
           
       // 
      if (isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
          // echo"login pass";
            include("php/config.php");
              // $status="created";
              $sql = mysqli_query($Connection,"SELECT * FROM user WHERE status = 'User'");


              // $sql = mysql_query("SELECT * FROM educationservice WHERE username like '".$_SESSION['UserID']. "' ORDER BY date desc");
             
                while($row = mysqli_fetch_array($sql)){
                  echo "<tr>";
                       // echo "<td align='center'><a href='serviceDetails.php?id=".$row["serviceID"]."' class='btn btn-warning' id='".$row["serviceID"]."'><span class='fa fa-file-text-o'></span></a></td>"; 
                       echo "<td align='left'>".$row["name"]."</td>";
                       echo "<td align='center'>".$row["employee_id"]."</td>";
                       echo "<td align='left'>".$row["department"]."</td>";
                       echo "<td align='center'>".$row["telno"]."</td>";
                       echo "<td align='center'>".$row["phone"]."</td>";
                       echo "<td align='left'>".$row["email"]."</td>";
                       echo "<td align='left'>".$row["username"]."</td>";
                       echo "<td align='center'>".$row["password"]."</td>";
                       echo "<td align='center'>".$row["status"]."</td>";
                       echo "<td align='center'><button class='btn btn-warning' data-toggle='modal' data-target='#edituser' onclick='editdata(this)' value='".$row["username"]."'><span class='fa fa-pencil-square-o'></span></button> </td>";
                       echo "<td align='center'><button class='btn btn-danger' data-toggle='modal' data-target='#deluser' onclick='editdata(this)' value='".$row["username"]."'><span class='fa fa-trash'></span></button> </td>";


                      // echo "<td align='center'><a href='deluser.php?id=".$row["username"]."' class='btn btn-danger' id='".$row["username"]."'><span class='fa fa-trash'></span></a></td>";  
                       // echo "<td align='center'><a href='RegisterEmp.html' class='btn btn-warning' title='แก้ไขข้อมูล''><span class='fa fa-file-text-o'></span></a></td>";
                       // echo "<td align='center'><label class='label label-default' id='status".$row["serviceID"]."'>".$row["serviceStatus"]."</label></td>";
                       // echo "<td align='center'><a class='fa fa-hand-pointer-o' href='customerTracking.php?id=".$row["serviceID"]."'></a></td>";
                      
                       // echo " <td align='center'><a href='serviceDetail.html' class='btn btn-warning' title='รายละเอียดงาน''><span class='fa fa-file-text-o'></span></a></td>";
                  echo "</tr>";
                }
              }else{
                echo "Please Login!";
              }

        ?>
     
      	</tbody>
		</table>
	


  </div>



<!-- Modal -->
  <div class="modal fade" id="edituser" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูลลูกค้า</h4>
        </div>
        <div class="modal-body">

              <form role="form" action="saveEdituser.php" method="post">

                <div class="form-group">
                                  <div class="col-sm-4"></div>
                                    <label for="username" class="col-sm-2 control-label">ชื่อผู้ใช้งาน</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้งาน" readonly="true" required autofocus>
                                    </div>
                                </div>


                <div class="form-group">
                  <div class="col-sm-4"></div>
                    <label for="fullname" class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="ชื่อ-นามสกุล" required autofocus>
                        </div>                
                </div>


                <div class="form-group">
                   <div class="col-sm-4"></div>
                                    <label for="employeecode" class="col-sm-2 control-label">รหัสพนักงาน</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="employeecode" name="employeecode" placeholder="รหัสพนักงาน" required autofocus>
                                    </div>
                                </div>


                 <div class="form-group">
                    <div class="col-sm-4"></div>
                                     <label for="department" class="col-sm-2 control-label">แผนก/ฝ่าย</label>
                                    <div class="col-sm-4">
                                    <input type="text" id="department" name="department"  class="form-control" required autofocus>
                                                                                  
                                    </div>
                                </div>

                 

                                 <div class="form-group">
                                  <div class="col-sm-4"></div>
                                    <label for="telephone" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="เบอร์โทรศัพท์" required autofocus>
                                    </div>
                                </div>


                                 <div class="form-group">
                                  <div class="col-sm-4"></div>
                                    <label for="phone" class="col-sm-2 control-label">เบอร์มือถือ</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์มือถือ" required autofocus>
                                    </div>
                                </div>



                  
                  
                           <div class="form-group">
                            <div class="col-sm-4"></div>
                                    <label for="email" class="col-sm-2 control-label">อีเมล</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="ที่อยู่อีเมล" required autofocus>
                                    </div>
                                </div>

                                 
                                    
                                <div class="form-group">
                                  <div class="col-sm-4"></div>
                                    <label for="password" class="col-sm-2 control-label">รหัสผ่าน</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" required autofocus>
                                    </div>
                                </div><br/>      
  
   
        <div class="modal-footer">
                <!-- <label>ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</label>
                <br/>
                <label>โทรศัพท์ : 0-4422-4994 โทรสาร : 0-4422-4974</label>
                <br/>
                <label><a href="http://ceit.sut.ac.th">ceit.sut.ac.th</a></label> -->
                <br/><br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> 
                <br/><button type="submit" class="btn btn-sm btn-primary">แก้ไข</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </form>        
        </div>
      </div>
      
    </div>
  </div>
  
</div>




<!-- Modal -->
  <div class="modal fade" id="deluser" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> </h4>
        </div>
        <div class="modal-body">

              <form role="form" action="deluser.php" method="post">

                <div class="form-group">
                  <div class="col-sm-4"></div>
                      <label for="username" class="col-sm-4 control-label">ต้องการลบข้อมูลลูกค้าหรือไม่?</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="username1" name="username" placeholder="ชื่อผู้ใช้งาน" <?php echo "style='display:none;'"; ?> required autofocus>
                  </div>
                 </div>
               
    
   
        <div class="modal-footer">
          <!-- <label>ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</label><br/>
          <label>โทรศัพท์ : 0-4422-4994 โทรสาร : 0-4422-4974</label><br/>
          <label><a href="http://ceit.sut.ac.th">ceit.sut.ac.th</a></label><br/> -->
          <br/><br/>
          <button type="submit" class="btn btn-sm btn-primary">ยืนยัน</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
          </center>
        </form>        
        </div>
      </div>
      
    </div>
  </div>
  
</div>



</body>
<script src="js/event.js"></script>


<script type="text/javascript">
  username = '<?php echo $_SESSION["UserID"] ;?>';
  var userID;

       function editdata(e){
          userID=e.value;
         
          $("#username").val(userID);

          $("#username1").val(userID);



          $.ajax({
                   type: "POST",
                   url: "php/SelectUserEdit.php",
                   cache: false,
                   data: "userid="+userID,
                   success: function(msg){
                    var name = msg.split(",");

                    
                        $("#fullname").val(name[3])
                        $("#employeecode").val(name[4])
                        $("#department").val(name[5])
                        $("#telephone").val(name[6])
                        $("#email").val(name[7])
                        $("#phone").val(name[10])
                        $("#password").val(name[2])
                  }
                 });


       }

</script>

</html>

   