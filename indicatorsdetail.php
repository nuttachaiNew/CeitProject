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
                    <li><a href="userdetail.php" >จัดการข้อมูลลูกค้า</a></li>
                    <li><a href="Empdetail.php">จัดการข้อมูลพนักงาน</a></li>
                    <li class="active" ><a href="indicatorsdetail.php">เพิ่มตัวชี้วัด</a></li>
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
                         <li class="active">จัดการข้อมูลตัวชี้วัด</li>
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
<button type="button" class="btn btn-sm btn-primary pull-left" data-toggle="modal" data-target="#addimd"><span class='fa fa-plus'>  เพิ่มตัวชี้วัด</span></button>
</div>
<div class="row">
<div class="form-horizontal col-sm-12" style="margin-top:1%" id="tableScrollingY">
	<table class="table table-responsive">
		<thead>
			<tr>
				<th class="th">รหัสตัวชี้วัด</th>
				<th class="th">ชื่อตัวชี้วัด</th>
        <th class="th">แก้ไขข้อมูล</th>
        <th class="th">ลบไขข้อมูล</th>
				<!-- <th class="th">แผนก</th>
				<th class="th">เบอร์โทรศัพท์</th>
				<th class="th">อีเมลล์</th>
        <th class="th">ชื่อผู้ใช้งาน</th>
        <th class="th">รหัสเข้าใช้งาน</th>
        <th class="th">สถานะ</th>
        <th class="th">แก้ไขข้อมูล</th> -->
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
              $sql = mysqli_query($Connection,"SELECT * FROM indicators");


              // $sql = mysql_query("SELECT * FROM educationservice WHERE username like '".$_SESSION['UserID']. "' ORDER BY date desc");
             
                while($row = mysqli_fetch_array($sql)){
                  echo "<tr>";
                       // echo "<td align='center'><a href='serviceDetails.php?id=".$row["serviceID"]."' class='btn btn-warning' id='".$row["serviceID"]."'><span class='fa fa-file-text-o'></span></a></td>"; 
                       echo "<td align='center'>".$row["indicatorID"]."</td>";
                       echo "<td align='center'>".$row["indicatorName"]."</td>";
                       echo "<td align='center'><button class='btn btn-warning' data-toggle='modal' data-target='#editind' onclick='editdata(this)' value='".$row["indicatorID"]."'><span class='fa fa-pencil-square-o'></span></button> </td>";
                       echo "<td align='center'><button class='btn btn-danger' data-toggle='modal' data-target='#delind' onclick='editdata(this)' value='".$row["indicatorID"]."'><span class='fa fa-trash'></span></button> </td>";


                       // echo "<td align='center'><a href='Editindicators.php?id=".$row["indicatorID"]."' class='btn btn-warning' id='".$row["indicatorID"]."'><span class='fa fa-pencil-square-o'></span></a></td>";
                       // echo "<td align='center'><a href='delindicators.php?id=".$row["indicatorID"]."' class='btn btn-danger' id='".$row["indicatorID"]."'><span class='fa fa-trash'></span></a></td>";  
                       
                      // OnClick='chkConfirm()'

                      
                  echo "</tr>";
                }
              }else{
                echo "Please Login!";
              }


              mysqli_close($Connection);

        ?>
<!-- 		

      	</tbody>
		</table>
	


  </div>


  
<!-- modal -->

<!--addModal**************************************************************************************************** -->
  <div class="modal fade" id="addimd" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิ่มข้อมูลตัวชี้วัด</h4>
        </div>
        <div class="modal-body">

              <form role="form" action="saveindicators.php" method="post">

                <div class="form-group">
                  <div class="col-sm-3"></div>
                    <label for="fullname" class="col-sm-2 control-label">ระบุชื่อตัวชี้วัด</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="indname" placeholder="ชื่อตัวชี้วัด" required autofocus>
                        </div>                
                </div>
                                                             
            
    
        </div>
        <div class="modal-footer">
          <!-- <label>ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</label><br/>
                      <label>โทรศัพท์ : 0-4422-4994 โทรสาร : 0-4422-4974</label><br/>
                      <label><a href="http://ceit.sut.ac.th">ceit.sut.ac.th</a></label><br/> -->
                      <br/><br/>
 
                       <button type="submit" class="btn btn-sm btn-primary">เพิ่มตัวชี้วัด</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </form>        
        </div>
      </div>
      
    </div>
  </div>
  
</div>



<!-- editModal************************************************************************************************* -->
  <div class="modal fade" id="editind" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> </h4>
        </div>
        <div class="modal-body">

              <form role="form" action="saveEditindicators.php" method="post">

                <!-- <div class="form-group">
                  <div class="col-sm-4"></div>
                      <label for="indicatorID" class="col-sm-4 control-label">ต้องการลบข้อมูลตัวชี้วัดหรือไม่?</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="indicatorID1" name="indicatorID" >
                  </div>
                 </div>    -->




                  <div class="form-group">
                    <div class="col-sm-3"></div>
                      <label for="employeecode" class="col-sm-3 control-label">รหัสตัวชี้วัด</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" id="indicatorID" name="indicatorID" readonly="true" placeholder="รหัสพนักงาน" required autofocus>
                      </div>
                  </div>
                                                                        
                                           
                  <div class="form-group">
                    <div class="col-sm-3"></div>
                      <label for="fullname" class="col-sm-3 control-label">ชื่อตัวชี้วัด</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" id="indicatorname" name="indicatorname"  placeholder="ชื่อ-นามสกุล" required autofocus>
                      </div>
                  </div>                      

   
        <div class="modal-footer">
          <!-- <label>ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</label><br/>
          <label>โทรศัพท์ : 0-4422-4994 โทรสาร : 0-4422-4974</label><br/>
          <label><a href="http://ceit.sut.ac.th">ceit.sut.ac.th</a></label><br/> -->
          <br/><br/>
          <br/><br/><button type="submit" class="btn btn-sm btn-primary">แก้ไข</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
          </center>
        </form>        
        </div>
      </div>
      
    </div>
  </div>
  
</div>




<!-- delModal********************************************************************************************************** -->
  <div class="modal fade" id="delind" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> </h4>
        </div>
        <div class="modal-body">

              <form role="form" action="delindicators.php" method="post">

                <div class="form-group">
                  <div class="col-sm-4"></div>
                      <label for="indicatorID" class="col-sm-4 control-label">ต้องการลบข้อมูลตัวชี้วัดหรือไม่?</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="indicatorID1" name="indicatorID" <?php echo "style='display:none;'"; ?>>
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
         
          $("#indicatorID").val(userID);

          $("#indicatorID1").val(userID);



          $.ajax({
                   type:"POST",
                   url: "php/SelectindEdit.php",
                   cache: false,
                   data: "userid="+userID,
                   success: function(msg){
                    var name = msg.split(",");

                    
                        $("#indicatorid").val(name[0])
                        $("#indicatorname").val(name[1])
                        
                  }
                 });


       }
</script>

</html>

   