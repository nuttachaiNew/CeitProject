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
      if(!isset($_SESSION["UserID"])|| ($_SESSION['Status']!="Employee") && ($_SESSION['Status']!="Approver")){
          header("location:Login.html");
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


</nav>
<!-- menu -->
<!-- head menu -->
<div class="container">
	<div class="form-horizontal">
		 <div class="form-horizontal" role="form">
                    <ol class="breadcrumb">
                         <li> CEIT Service </li>
                         <li class="active">Employee's work</li>
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
  <a href="#" class="list-group-item" id="working">งานที่ดำเนินการ <span class="badge"><p class="working">0</p></span> </a>
  <a href="#" class="list-group-item" id="newwork">งานที่รอดำเนินการ <span class="badge"><p class="newwork">0</p></span> </a>
 <a href="#" class="list-group-item" id="completing">งานที่สำเร็จแล้ว <span class="badge"><p class="completing">0</p></span> </a>

</div>


<div class="panel panel-warning" id="detail" style="display:none;">
  <div class="panel-heading">
    <h3 class="panel-title">ข้อมูลงาน</h3>
  </div>
  <div class="panel-body">
      <label>หมายเลขบริการ :</label> <span id="serviceID"></span><br/>
      <label>วันที่ :</label> <span id="date"></span><br/>
      <label>เวลา :</label> <span id="time"></span><br/>
      <label>งานพอสังเขป :</label> <span id="type"></span><br/>
      <label>สถานที่ :</label> <span id="serviceLocation"></span><br/>
      <label>รับผลงานวันที่ :</label> <span id="dueDate"></span><br/>
      <button class="btn btn-warning" id="confirmWork" style="display:none"><span class='fa fa-check-square-o'> รับงาน</span></button>
  </div>
</div>


<div class="panel panel-success" id="workDetail"style="display:none;" >
  <div class="panel-heading">
    <h3 class="panel-title">ข้อมูลงาน</h3>
  </div>
  <div class="panel-body">
      <label>หมายเลขบริการ :</label><br/> <input type="text" id="serviceID"  disabled="true" length="5" /><br/>
      <label>วันที่ออกปฏิบัติงาน :</label><br/> <input type="text" id="date"  disabled="true" length="5" /><br/>
      <label>เวลา :</label><br/> <input type="text" id="time"  disabled="true" length="5" /><br/>
      <label>สถานที่ :</label><br/> <input type="text" id="serviceLocation"  disabled="true" length="5" /><br/>
      <label>งานพอสังเขป :</label><br/> <input type="text" id="workDescription"  disabled="true" length="5" /><br/>
      <label>วันที่ส่งงาน :</label><br/> <input type="text" id="recieveDate"  disabled="true" length="5" /><br/>
      <label>งานที่ปฏิบัติวันนี้ :</label><br/> <input type="text" id="taskProgess"  disabled="true" length="5" /><br/>
       <label>สำเร็จเป็น :</label><br/> <input type="text" id="progess" maxlength="3" class="numbersOnly" disabled="true" length="3" /> <label> %</label><br/>
    <br/>  <button class="btn btn-info" id="updateWork" style="display:none;" ><span class='fa fa-pencil-square-o'> อัพเดตความคืบหน้า</span></button>  <button class="btn btn-success" id="confirmUpdate" style="display:none;" ><span class='fa fa-floppy-o'> บันทึก</span></button>

  </div>
</div>


</div>
<div class="form-horizontal col-sm-9" style="margin-top:1%;display:none;" id="tableScrollingY">
	
   <h4>งานที่ปฏิบัติขณะนี้</h4>
  <table class="table table-responsive">
		<thead>
			<tr>
				<th class="th">รายละเอียด</th>
				<th class="th">ประเภทการใช้งาน</th>
				<th class="th">สถานที่ปฏิบัติงาน</th>
				<th class="th">วันที่ขอใช้งาน</th>
				<th class="th">สถานะงาน</th>
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
         $sql = mysqli_query($Connection,"SELECT es.serviceID , es.serviceType , es.serviceLocation , es.date ,es.serviceStatus FROM educationservice es  WHERE   serviceStatus LIKE '".$status."' AND (es.empID1 = '".$username."' OR es.empID2 = '".$username."' OR es.empID3 = '".$username."' )  ");
                 // $sql = mysql_query("SELECT * FROM educationservice WHERE  empID1 LIKE  '".$username."' AND serviceStatus LIKE '".$status."' ");
                while($row = mysqli_fetch_array($sql)){
                  
                  echo "<tr>";
                       echo "<td align='center'><button class='btn btn-info ' id='".$row["serviceID"]."'  onclick='worked(".$row['serviceID'].")'><span class='fa fa-file-text-o'></span></button></td>"; 
                     if($row["serviceType"]=="education"){
                       echo "<td align='left'>เพื่อการเรียนการสอน</td>";
                     }else{
                       echo "<td align='left'>เพื่อการประชาสัมพันธ์</td>";
                     }
                      
                       echo "<td align='left'>".$row["serviceLocation"]."</td>";
                       echo "<td align='center'>".$row["date"]."</td>";
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
  <div class="col-sm-offset-3 form-horizontal" id="workApprove" style="margin-top:1%;display:none;">
        <h4>งานที่รอดำเนินการ</h4>
 <table class="table table-responsive">
    <thead>
      <tr>
        <th class="th">รายละเอียด</th>
        <!-- <th class="th">ประเภทการใช้งาน</th> -->
        <!-- <th class="th">สถานที่ปฏิบัติงาน</th> -->
        <th class="th">วันที่ขอใช้งาน</th>
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
              $status="approve";
            $serviceID=0;
            
            $sql = mysqli_query($Connection,"SELECT es.serviceID , es.serviceType , es.serviceLocation , es.date ,es.serviceStatus FROM educationservice es  WHERE   serviceStatus LIKE '".$status."' AND (es.empID1 = '".$username."' OR es.empID2 = '".$username."' OR es.empID3 = '".$username."' )  ");
            
              // $sql = mysql_query("SELECT * FROM educationservice WHERE  empID1 LIKE  '".$username."' AND serviceStatus LIKE '".$status."' ");
                while($row = mysqli_fetch_array($sql)){
                  
                  echo "<tr>";
                       echo "<td align='center'><button class='btn btn-info ' id='".$row["serviceID"]."' onclick='workQuery(".$row['serviceID'].")'><span class='fa fa-file-text-o'></span></button></td>"; 
                       // echo "<td align='center'>".$row["serviceType"]."</td>";
                       // echo "<td align='center'>".$row["serviceLocation"]."</td>";
                       echo "<td align='center'>".$row["date"]."</td>";
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
         <th class="th">ความพึงพอใจ</th>
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
           
            $sql = mysqli_query($Connection,"SELECT es.requestDate,es.serviceID,es.workDescription , es.serviceType , es.serviceLocation ,es.serviceStatus,es.rating FROM educationservice es  WHERE serviceStatus LIKE '".$status."' AND ( empID1 LIKE  '".$username."' OR empID2 LIKE  '".$username."' OR empID3 LIKE  '".$username."' ) ");
            
              // $sql = mysql_query("SELECT * FROM educationservice WHERE  empID1 LIKE  '".$username."' AND serviceStatus LIKE '".$status."' ");
                while($row = mysqli_fetch_array($sql)){
                  
                  echo "<tr>";
                      echo "<td align='center'>".$row["requestDate"]."</td>";
                       echo "<td align='left' width='50%'>".$row["workDescription"]."</td>";
                    if($row["serviceType"]=="education"){
                       echo "<td align='left'>เพื่อการเรียนการสอน</td>";
                     }else{
                       echo "<td align='left'>เพื่อการประชาสัมพันธ์</td>";
                     }
                      echo "<td align='center'><label class='label label-default' id='status".$row["serviceID"]."'>".$row["serviceStatus"]."</label></td>";
                      echo "<td align='center'>";
                        for ($i=1;$i<=$row["rating"];$i++){
                              echo "<i class='fa fa-star fa-fw'></i>";
                             }
                      echo "</td>";
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
 
  

</div>   <!--container -->

<!-- modal -->
</body>
 <script src="js/event.js"></script>
<!-- <script src="js/seviceClient.js"></script> -->

<script type="text/javascript">

 $( document ).ready(function() { 
 console.log("test")
   working();
   approveWork();
   completed();
   statusDisplay();
});


function statusDisplay(){
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET","php/statusService.php",false);
    xmlHttp.send(null);
    var text =xmlHttp.responseText;
    var ch = text.split(".");
    var sub={};
    var id={};
    var status={};
    // $.each(ch,function(index,item){
    //    if(item==""||item==null){
          // console.log("null")
    //    }else{
    //      console.log(item)
    //    }
        
    // });

    for(i=0;i<ch.length-1;i++){ 
      sub[i]=ch[i].split(",");
      id[i]=sub[i][0];
      status[i]=sub[i][1];
      // /console.log(id[i]+" "+status[i])
      // console.log($("#status"+id[i]).text());
      if($("#status"+id[i]).text()=='created'){
        $("#status"+id[i]).addClass("label-defualt");
      }else if($("#status"+id[i]).text()=='waiting'){
        $("#status"+id[i]).addClass("label-info");      
      }else if($("#status"+id[i]).text()=='working'){
        $("#status"+id[i]).addClass("label-success");     
      }else if($("#status"+id[i]).text()=='approve'){
        $("#status"+id[i]).addClass("label-warning");     
      }else if($("#status"+id[i]).text()=='complete'){
        $("#status"+id[i]).addClass("label-danger");      
      }

    }
}
 function approveWork(){
  emp1='<?php echo $_SESSION["UserID"] ;?>';
  
  status='approve';
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST","php/waitWork.php",false);
    param="emp1="+emp1+"&status="+status;
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.setRequestHeader("Content-length", param.length);
    xmlHttp.setRequestHeader("Connection", "close");
    xmlHttp.send(param);
   
    var qty =parseInt(xmlHttp.responseText);
    $(".newwork").text(qty);
}
    function working(){
          emp1='<?php echo $_SESSION["UserID"] ;?>';
 
  status='working';
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST","php/waitWork.php",false);
    param="emp1="+emp1+"&status="+status;
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.setRequestHeader("Content-length", param.length);
    xmlHttp.setRequestHeader("Connection", "close");
    xmlHttp.send(param);
   
    var qty =parseInt(xmlHttp.responseText);
   
    $(".working").text(qty);

    }
      function completed(){
          emp1='<?php echo $_SESSION["UserID"] ;?>';
 
  status='complete';
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST","php/waitWork.php",false);
    param="emp1="+emp1+"&status="+status;
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.setRequestHeader("Content-length", param.length);
    xmlHttp.setRequestHeader("Connection", "close");
    xmlHttp.send(param);
   
    var qty =parseInt(xmlHttp.responseText);
   
    $(".completing").text(qty);

    }

    $("a#working").click(function(){
      $("div#completed").hide()
      $("div#workDetail").show()
      $("div#detail").hide()
      $("div#tableScrollingY").show()
       $("div#workApprove").hide()
    });
   $("a#newwork").click(function(){
    $("div#completed").hide()
     $("div#workDetail").hide()
      $("div#detail").show()
      $("div#tableScrollingY").hide()
      $("div#workApprove").show()
    });
   $("a#completing").click(function(){
     $("div#completed").show()
      $("div#workDetail").hide()
      $("div#detail").hide()
      $("div#tableScrollingY").hide()
      $("div#workApprove").hide()
   });

   function workQuery(text){
      var serviceID=text;
        $.ajax({
           type: "POST",
           url: "php/selectByID.php",
           cache: false,
           data: "serviceID="+serviceID,
           success: function(msg){
                 var text=msg.split(",")
                  id =text[0];
                  ddate=text[1];
                  time=text[2];
                  type=text[3];
                  serviceLocation=text[4]; 
                  dueDate=text[5]   
                $("span#serviceID").text(id);
                $("span#date").text(ddate);
                $("span#time").text(time);
                $("span#type").text(type);
                $("span#serviceLocation").text(serviceLocation);
                $("span#dueDate").text(dueDate)
                $("button#confirmWork").show()  
              }
            });
   }
      function worked(text){
      var serviceID=text;
        $.ajax({
           type: "POST",
           url: "php/selectForTask.php",
           cache: false,
           data: "serviceID="+serviceID,
           success: function(msg){
                 var text=msg.split(",")
                 id=text[0];
                 ddate=text[1];
                 time=text[2]
                 workDescription=text[3]
                 serviceLocation=text[4]
                 progress=text[5]
                 $("input#serviceID").val(id)
                 $("input#date").val(ddate)
                 $("input#time").val(time)
                 $("input#workDescription").val(workDescription)
                 $("input#serviceLocation").val(serviceLocation)
                 $("input#progess").val(progress)
                 $("input#recieveDate").val(text[6])
              $("#updateWork").show();
              }
            });
      // 
        $.ajax({
            type: "POST",
            url: "php/lastTask.php",
             cache: false,
             data: "id="+serviceID,
             success: function(msg){
                $("#taskProgess").val(msg)
             }
            }); 


   }

   $("#confirmWork").click(function(){
      var status='working';
      var task=1;
      var serviceID=$("span#serviceID").text()
           $.ajax({
           type: "GET",
           url: "php/statusUpdate.php",
           cache: false,
           data: "id="+serviceID+"&status="+status+"&addTask="+task,
           success: function(msg){
             alert("รับงานเรียบร้อย");
             location.reload();
           }
        });
   });

$("#updateWork").click(function(){
$("input#taskProgess").prop('disabled', false);
$("input#progess").prop('disabled', false);
    $("input#progess").val("")
    $("#confirmUpdate").show()
    $("#updateWork").hide()
});

$("#confirmUpdate").click(function(){
$("input#taskProgess").prop('disabled', true);
$("input#progess").prop('disabled', true);
    $("#confirmUpdate").hide()
    // $("#updateWork").show()
       serviceID=$("input#serviceID").val()
       taskProgess=$("input#taskProgess").val()
       progess= $("input#progess").val()
      if(parseInt(progess)<100){
        $.ajax({
           type: "GET",
           url: "php/updateTask.php",
           cache: false,
           data: "id="+serviceID+"&progess="+progess+"&taskProgess="+taskProgess,
           success: function(msg){
             alert("บันทึกความก้าวหน้าเรียบร้อย");
             //
           }
        });
      }else{
        var status='complete';
          $.ajax({
           type: "GET",
           url: "php/complete.php",
           cache: false,
           data: "id="+serviceID+"&progess="+progess+"&taskProgess="+taskProgess+"&status="+status,
           success: function(msg){
             alert("งานสำเร็จเรียบร้อยแล้ว...กำลังส่งเมลล์ถึงผู้ขอใช้บริการ");
                var mail="send";
                $.ajax({
                   type: "GET",
                   url: "send.php",
                   cache: false,
                   data: "serviceID="+serviceID+"&mail="+mail,
                   success: function(msg){
                       
                }
         })
            
           }
        });

      }

})

$("#progess").keyup(function(){
   if(parseInt($("#progess").val())>100){
      $("#progess").val(100);
   }
});


</script>

</html>

   