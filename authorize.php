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


    <?php
      session_start();

       if(!isset($_SESSION["UserID"])|| $_SESSION['Status']!="Approver"){
          header("location:Login.html");
      }
    ?>
</head>
<body >



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


</nav>
<!-- menu -->
<!-- head menu -->
<div class="container">
	<div class="form-horizontal">
		 <div class="form-horizontal" role="form">
                    <ol class="breadcrumb">
                         <li> CEIT Service </li>
                         <li class="active">Authorize Menu</li>
                    </ol>
            </div>
	</div>	

<!-- container -->
<div class="row" id="working"> 
<div class="col-sm-3" id="alertNewWork" style="margin-top:1%"> 
        <div class="list-group">
  <a href="#" class="list-group-item active" style="text-align:right">
   สถานะงาน
  </a>
   <a href="#" class="list-group-item" id="approving">งานที่รอการอนุมัติ <span class="badge"><p class="approving">0</p></span> </a>
  <a href="#" class="list-group-item" id="working">งานที่ดำเนินการ <span class="badge"><p class="working">0</p></span> </a>
   <a href="#" class="list-group-item" id="completing">งานที่สำเร็จ <span class="badge"><p class="completing">0</p></span> </a>
  
</div>





</div>
<div class="form-horizontal col-sm-6" style="margin-top:1%;display:none;" id="tableScrollingY">
	
   <h4>งานที่ปฏิบัติขณะนี้</h4>
  <table class="table table-responsive">
		<thead>
			<tr>
				<th class="th">รายละเอียดงาน</th>
			  <th class="th">ความคืบหน้า</th>
        <th class="th">รายละเอียด</th>
				<!-- <th class="th"></th> -->
			</tr>
		</thead>
		<tbody id="dataGrid">
 
       <?php
           
       // 
      // if (isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
          // echo"login pass";
       // echo "สวัสดี ".$_SESSION['UserID'];
          $username=$_SESSION['UserID'];
            include("php/config.php");
              $status="working";
            $serviceID=0;
           $sql = mysqli_query($Connection,"SELECT es.serviceID , es.workDescription , es.progess FROM educationservice es  WHERE serviceStatus LIKE '".$status."' ");
               // $sql = mysql_query("SELECT * FROM educationservice WHERE  empID1 LIKE  '".$username."' AND serviceStatus LIKE '".$status."' ");
                while($row = mysqli_fetch_array($sql)){
                  
                  echo "<tr>";
                    
                       echo "<td align='left'>".$row["workDescription"]."</td>";
                       echo "<td align='center'>".$row['progess']."%</td>";
                       echo "<td align='center'><button  class='btn btn-success ' id='".$row["serviceID"]."' onclick='renderData(".$row['serviceID'].")'><span class='fa fa-arrow-right'></span></button></td>"; 
                 
                  echo "</tr>";
                  
                }
               
              // }else{
              //   echo "Please Login!";
              // }

        ?>

      	</tbody>
		</table>
	


  </div>


    <div class="col-sm-3" id="details" style="margin-top:1%"> 

        <div class="panel panel-success" id="who" style="display:none;">
          <div class="panel-heading">
            <h3 class="panel-title">ข้อมูลงาน</h3>
          </div>
          <div class="panel-body">
              <label>ผู้ปฏิบัติ 1 :</label> <span id="emp1"></span><br/>
              <label>ผู้ปฏิบัติ 2 :</label> <span id="emp2"></span><br/>
              <label>ผู้ปฏิบัติ 3 :</label> <span id="emp3"></span><br/>
              <label>งานอยู่ในขั้นตอน  :</label> <span id="task"></span><br/>
              <input type="hidden" id="editID" />
              <button class="btn btn-warning" style="display:none" id="edit" data-toggle="modal" data-target="#approveModal" ><span class='fa fa-pencil-square-o'>เปลี่ยนผู้ปฏิบัติงาน</span></button>
          </div>
        </div>

    </div>
     <div class="col-sm-offset-3 form-horizontal" id="workApprove" style="margin-top:1%;display:none;">
        <h4>งานที่รอการอนุมัติ</h4>
 <table class="table table-responsive">
    <thead>
      <tr>
        <th class="th">อนุมัติงาน</th>
        <th class="th">วันที่ขอใช้บริการ</th>
        <th class="th">รายละเอียดงาน</th>
      </tr>
    </thead>
    <tbody id="dataGrid">
 
       <?php
    
          $username=$_SESSION['UserID'];
            include("php/config.php");
              $status="waiting";
         
            
            $sql = mysqli_query($Connection,"SELECT es.serviceID, es.date ,es.workDescription FROM educationservice es WHERE   es.serviceStatus LIKE '".$status."' ");
           
               while($row = mysqli_fetch_array($sql)){
                    echo "<tr>";
                       echo "<td align='center'><a href='serviceDetails.php?id=".$row["serviceID"]."' class='btn btn-success' id='".$row["serviceID"]."'><span class='fa fa-check-square-o'></span></a></td>"; 
                    echo "<td align='center'>".$row["date"]."</td>";
                    echo "<td align='left'>".$row['workDescription']."</td>";
                    echo "</tr>";
                }
               
           
        ?>

        </tbody>
    </table>

  </div>
  <!--  -->
<div class="col-sm-offset-3 form-horizontal" id="completed" style="margin-top:1%;display:none;">
        <h4>งานทีสำเร็จแล้ว</h4>
 <table class="table table-responsive">
    <thead>
      <tr>
        <th class="th">วันที่ขอบริการ</th>
        <th class="th">รายละเอียด</th>
        <th class="th">ประเภทของงาน</th>
        <th class="th">สถานะงาน</th>
        
        <!-- <th class="th"></th> -->
      </tr>
    </thead>
    <tbody id="dataGrid">
 
       <?php
           
       // 
      // if (isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
          // echo"login pass";
          $username=$_SESSION['UserID'];
            include("php/config.php");
              $status="complete";
            // $serviceID=0;
            
            $sql = mysqli_query($Connection,"SELECT es.requestDate,es.serviceID,es.workDescription , es.serviceType , es.serviceLocation ,es.serviceStatus FROM educationservice es  WHERE serviceStatus LIKE '".$status."' ");
            
              // $sql = mysql_query("SELECT * FROM educationservice WHERE  empID1 LIKE  '".$username."' AND serviceStatus LIKE '".$status."' ");
                while($row = mysqli_fetch_array($sql)){
                  
                  echo "<tr>";
                      echo "<td align='center'>".$row["requestDate"]."</td>";
                       echo "<td align='left' width='50%'>".$row["workDescription"]."</td>";
                       if($row["serviceType"]=='education'){
                        echo "<td align='left'>เพื่อการเรียนการสอน</td>";
                       }else{
                          echo "<td align='left'>เพื่อการประชาสัมพันธ์</td>";
                       }
                       
                      echo "<td align='center'><label class='label label-default' id='status".$row["serviceID"]."'>".$row["serviceStatus"]."</label></td>";
                     
                       // echo " <td align='center'><a href='serviceDetail.html' class='btn btn-warning' title='รายละเอียดงาน''><span class='fa fa-file-text-o'></span></a></td>";
                  echo "</tr>";
                  
                }
               
              // }else{
              //   echo "Please Login!";
              // }

        ?>

        </tbody>
    </table>

  </div>
 

 </div>
 </div>

</div>   <!--container -->
<div class="modal fade" id="approveModal" name="Add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <h4 class="modal-title">อนุมัติงาน : <span id="desc"> </span></h4>
                </div>
                <div class="modal-body border">
                    <!--===============================================-->
                 
                        <span class="col-sm-3"></span>
                        <label>อนุมัติงานให้ 1 :</label> 
                        <select id="emp1">
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
                    <br/>    <button id="approveConfirm" type="button" data-toggle="popover" class="btn btn-sm btn-primary">อนุมัติงาน</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </center>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal-->

<!-- modal -->
<!-- <button id="reloads"></button> -->
</body>
<script src="js/event.js"></script>
<script src="js/seviceClient.js"></script>

<script type="text/javascript"> 

  // username = '<?php echo $_SESSION["UserID"] ;?>';
var emp1;
var emp2;
var emp3;
 $( document ).ready(function() {
      working()
      waiting()
      completed()
});

    $("a#working").click(function(){
      $("div#who").show()
      $("div#workApprove").hide()
      $("div#tableScrollingY").show()
       $("div#completed").hide()
 
    });
   $("a#approving").click(function(){
     $("div#who").hide()
     $("div#workApprove").show()
      $("div#tableScrollingY").hide()
       $("div#completed").hide()
     
    });
   $("a#completing").click(function(){
      $("div#who").hide()
      $("div#completed").show()
      $("div#workApprove").hide()
      $("div#tableScrollingY").hide()
   });
  
  function renderData(id){
    renderEmployee(id);
    renderLastTask(id);
}
 function renderEmployee(id){

   $.ajax({
           type: "POST",
           url: "php/employeeData.php",
           cache: false,
           data:"id="+id,
           success: function(msg){
                var text=msg.split(",");
                // console.log(text[0]+""+text[1]+""+text[2])
                                emp1=text[0];
                                emp2=text[1];
                                emp3=text[2];
                                 $("input#editID").val(text[3])
                                 $("span#desc").text(text[4])
                     $.ajax({
                             type: "POST",
                             url: "php/employee.php",
                             cache: false,
                             data:"empid1="+text[0]+"&empid2="+text[1]+"&empid3="+text[2],
                               success: function(msg){

                                var emp = msg.split(",");
                                $("span#emp1").text("");
                                $("span#emp2").text("");
                                $("span#emp3").text("");
                            
                                $("span#emp1").text(emp[0])
                                $("span#emp2").text(emp[1])
                                $("span#emp3").text(emp[2])
                               
                                $("button#edit").show()
                                // console.log("pass")
                               }
                             });

           }
         });
 } 
  function renderLastTask(id){
     $.ajax({
           type: "POST",
           url: "php/lastTask.php",
           cache: false,
           data:"id="+id,
           success: function(msg){
                  $("span#task").text(msg);
           }
         });
  }
  function working(){
    
  status='working';
   $.ajax({
              type: "POST",
              url: "php/authorWork.php",
              cache: false,
              data:"status="+status,
              success: function(msg){
                 var qty =parseInt(msg);
                $(".working").text(qty);
            }
          });

  

    }
     function waiting(){
    
  status='waiting';
   $.ajax({
              type: "POST",
              url: "php/authorWork.php",
              cache: false,
              data:"status="+status,
              success: function(msg){
                 var qty =parseInt(msg);
                $(".approving").text(qty);
            }
          });

  

    }
         function completed(){
    
  status='complete';
   $.ajax({
              type: "POST",
              url: "php/authorWork.php",
              cache: false,
              data:"status="+status,
              success: function(msg){
                 var qty =parseInt(msg);
                $(".completing").text(qty);
            }
          });

  

    }

function reloadBody(){
  $("body").load("#working");
}

// setTimeout("reloadBody();",30000);

$("button#edit").click(function(){

 $("select#emp1").val(emp1)
 $("select#emp2").val(emp2)
 $("select#emp3").val(emp3)
 console.log(emp1 +" "+emp2+" "+emp3)
})

$("button#approveConfirm").click(function(){
  var id=$("#editID").val()
  var emp1=$("select#emp1").val()
   var emp2=$("select#emp2").val()
    var emp3=$("select#emp3").val()
    console.log(id + " "+emp1 +" "+emp2+" "+emp3 )
   $.ajax({
              type: "POST",
              url: "php/editApprove.php",
              cache: false,
              data:"serviceID="+id+"&emp1="+emp1+"&emp2="+emp2+"&emp3="+emp3,
              success: function(msg){
                    alert("แก้ไขสำเร็จ !!")
                    location.reload()
            }
          });

  
})
</script>

</html>

   