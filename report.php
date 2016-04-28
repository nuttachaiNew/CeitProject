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
<body>



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
                  <a><i class="fa fa-list fa-lg"></i>เมนูผู้จัดการ<span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                     <li  ><a href="authorize.php" >สถานะงานทั้งหมด</a></li>
                    <li class="active"><a href="report.php">รายงานการดำเนินงาน</a></li>
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
                  <i class="fa fa-power-off fa-lg"></i> Sign Out
                  </a>
                </li>
            </ul>
     </div>
</div>


</nav>
<div class="container">
  <div class="form-horizontal">
     <div class="form-horizontal" role="form">
                    <ol class="breadcrumb">
                         <li> CEIT Service </li>
                         <li class="active">Report</li>
                    </ol>
            </div>
  </div>  
    <div class="row" style="margin-top:1%">
       <select  class="form-control" id="emp">
        <?php
          include("php/config.php");
        $sql = mysqli_query($Connection,"SELECT * FROM  employee ORDER BY empID ");
           while($row = mysqli_fetch_array($sql)){
             echo "<option value=".$row["empID"]." >".$row["empID"]." : ". $row["empName"] ."</option>";
             }

        ?>
      </select>
    </div>
    <div class="row" style="margin-top:1%">
      <label class="col-sm-offset-4">ตั้งแต่วันที่</label>
      <input class="datepicker" type="text" id="date" />
      <button id="search" class="btn btn-primary"><i class="fa fa-search fa-lg"></i></button>
    </div>

    <div class="row" style="margin-top:2%">
     <div class="col-sm-offset-2 col-sm-4">
      <div class="panel panel-info" id="working" style="display:none;" >
        <div class="panel-heading">
          <h3 class="panel-title">
            งานที่กำลังดำเนินการ
          </h3>
        </div>
        <div class="panel-body">
            จำนวน <span id="count1">0</span> งาน
        </div>
        <div class="panel-footer">
          <a id="work" class="btn btn-link"><i class="fa fa-list"> </i>  detail</a>
        </div>
      </div>

    </div>
 
 <div class="col-sm-4">
      <div class="panel panel-success" id="completed" style="display:none;">
        <div class="panel-heading">
          <h3 class="panel-title">
            งานที่เสร็จแล้ว
          </h3>
        </div>
        <div class="panel-body">
          จำนวน <span id="count2">0</span> งาน
        </div>
        <div class="panel-footer">
          <a id="completed" class="btn btn-link"><i class="fa fa-list"> </i>  detail</a>
        </div>
      </div>
    </div>  
  </div>


  <div class="row" style="margin-top:1%">
  <!--    <div class="jumbotron" id="fetch" style="display:none;">
     
   </div>
 -->
 <div class="panel-group" id="workings" role="tablist" aria-multiselectable="true" style="display:none;">
   <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#workings" href="#finalScript" aria-expanded="true" aria-controls="finalScript">
            งานที่กำลังดำเนินการ
        </a>
      </h4>
    </div>
    <div id="finalScript" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body" id="fetch">
     
          


    </div>
       
     </div>
    </div>
  </div>
</div>

<div class="row" >
  <!--    <div class="jumbotron" id="fetch" style="display:none;">
     
   </div>
 -->
 <div class="panel-group" id="completeds" role="tablist" aria-multiselectable="true" style="display:none;">
   <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="h1">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#completeds" href="#script" aria-expanded="true" aria-controls="script">
            งานที่ทำสำเร็จ
        </a>
      </h4>
    </div>
    <div id="script" class="panel-collapse collapse " role="tabpanel" aria-labelledby="h1">
    <div class="panel-body" id="fetch">
     
          


    </div>
       
     </div>
    </div>
  </div>
</div>
<div class="row col-sm-6" style="margin-top:1%">
     <div class="panel-group" id="ind" role="tablist" aria-multiselectable="true" style="display:none;">
   <div class="panel panel-warning">
    <div class="panel-heading" role="tab" id="h1">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#completeds" href="#s" aria-expanded="true" aria-controls="s">
            ปฏิบัติงานตามตัวชี้วัด
        </a>
      </h4>
    </div>
    <div id="s" class="panel-collapse collapse " role="tabpanel" aria-labelledby="h1">
    <div class="panel-body" >
     
          <table class="table table-responsive " >
      <thead>
       <th class="th">ตัวชี้วัด</th>
       <th class="th">จำนวนงานที่ปฏิบัติ</th>
      </thead>
      <tbody>
        <?php
          $qty=0;
            include("php/config.php");
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
       
     </div>
    </div>
  </div>
    
</div>

</body>
<script src="js/event.js"></script>
<!-- <script src="js/seviceClient.js"></script> -->

<script type="text/javascript"> 

  // username = '<?php echo $_SESSION["UserID"] ;?>';

 $( document ).ready(function() {
   
      var checkin = $('#date').datepicker({
      onRender: function(date) {
      
       }
      }).on('changeDate', function(ev) {
       
         checkin.hide();
     
      }).data('datepicker');
      
});

  // console.log("<?php echo $qty; ?>")

$("#search").click(function(){
 if($("#date").val()==""){
  alert("กรุณาเลือกวันที่")
 }else{
  $("div#working").show()
  $("div#completed").show()
  var empID=$("#emp").val();
  var date=$("#date").val()
  countWork(empID,date);
   $("div#workings").hide()
    $("div#completeds").hide()
    $("div#ind").show()
    getLoop()
 }
 
 
});
function countWork(empID,date){
        $.ajax({
           type: "GET",
           url: "php/countAll.php",
           cache: false,
           data: "date="+date+"&empID="+empID,
           success: function(msg){
             var text=msg.split(",");
             $("span#count1").text(text[1]);
             $("span#count2").text(text[0]);
              
           }
        });
}

$("a#work").click(function(){
    var stat="working"
    var empID=$("#emp").val();
    var date=$("#date").val()
    var url="php/fetch.php";
    fetchData(url,stat,empID,date);
    $("div#workings").show()
    $("div#completeds").hide()
});
$("a#completed").click(function(){
    var stat="complete"
    var empID=$("#emp").val();
    var date=$("#date").val()
    var url="php/fetch2.php";
    fetchData(url,stat,empID,date);
      $("div#workings").hide()
       $("div#completeds").show()
});



function fetchData(url,stat,empID,date){
     $.ajax({
           type: "GET",
           url: url,
           cache: false,
           data: "date="+date+"&empID="+empID+"&status="+stat,
           success: function(msg){
              $("div#fetch").empty()
              $("div#fetch").append(msg);
           }
        });
}

function getLoop(){
  var loop=parseInt("<?php echo $qty; ?>");
  var empID=$("#emp").val();
  var date=$("#date").val();
  var j=0;

  for(i=1;i<=loop;i++){
    // console.log(i)
    //j=i
      
    $.ajax({
           type: "GET",
           url: "php/ind.php",
           cache: false,
           data: "indID="+i+"&empID="+empID+"&date="+date,
           success: function(msg){
           var text=msg.split(",")
            // console.log($("span#value"+i))
              // console.log(j)
             
                $('span#value'+text[1]).text(text[0])
                // console.log(j)
            
              
                     
           }
        });
 



  }
}
$("div#ind").click(function(){
$("div#workings").hide()
    $("div#completeds").hide()
});

</script>

</html>

   