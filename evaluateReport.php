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
  <link rel="stylesheet" type="text/css" href="css/sb-admin-2.css">

	
	
  
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
     <script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/themes/fusioncharts.theme.zune.js"></script>


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
                  <a><i class="fa fa-list fa-lg"></i>เมนูผู้จัดการ <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                     <li  ><a href="authorize.php" >สถานะงานทั้งหมด</a></li>
                    <li ><a href="report.php">รายงานการดำเนินงาน</a></li>
                    <li  ><a href="dashboard.php">Dashboard</a></li>
                      <li class="active"><a href="evaluateReport.php">ผลการประเมินการให้บริการ</a></li>
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
                    <li ><a href="serviceClient.php" >ขอใช้บริการผลิตสื่อโสตทัศน์</a></li>
                   
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
                         <li class="active">สรุปผลการประเมิน</li>
                    </ol>
            </div>
  </div>  
    
<div class="row" style="margin-top:1%">

   
   <div class="col-sm-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-sm-9 text-right">
                                    <div class="huge"><span id="qtyEvaluate">0</span> คน</div>
                                    <div>ประเมินผลแล้ว</div>
                                </div>
                            </div>
                        </div>
                        <a id="details">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>  
 <div class="col-sm-offset-6 col-sm-3" style="margin-top:1%">
      <div class="alert alert-success">
                ได้คะแนนประเมินเฉลี่ย  <span class="huge" id="point">0</span> / 10 
      </div>
 </div>
</div>
<div class="row" style="margin-top:1%">
    <div class="col-sm-8 col-sm-offset-4">
            <div id="chartContainer"></div>
          </div>
</div>



</div>
</body>
<script src="js/event.js"></script>
<!-- <script src="js/seviceClient.js"></script> -->

<script type="text/javascript"> 
var value1=0
var value2=0
var value3=0
var value4=0
var evaluate1=""
var evaluate2=""
var evaluate3=""
var evaluate4=""

  // username = '<?php echo $_SESSION["UserID"] ;?>';

 $( document ).ready(function() {
    // 
    countEvaluate()
});
function chart(value1,value2,value3,value4,evaluate1,evaluate2,evaluate3,evaluate4){
  // console.log(qtyComplete)
   FusionCharts.ready(function(){
                      var revenueChart = new FusionCharts({
                          "type": "column3d",
                          "renderAt": "chartContainer",
                          "width": "80%",
                          "height": "300",
                          "dataFormat": "json",
                          "dataSource":  {
                            "chart": {
                              "caption": "ผลการประเมิน",
                              "subCaption": "การใช้บริการศูนย์นวัตกรรม",
                              "xAxisName": "เนื้อหาที่ประเมิน",
                              "yAxisName": "คะแนนประเมิณ",
                              "theme": "zune"
                           },
                           "data": [
                              {
                                 "label": evaluate1 ,
                                 "value": value1
                              },
                              {
                                 "label": evaluate2,
                                 "value": value2
                              },
                              {
                                "label": evaluate3,
                                "value":  value3
                              },
                             {
                                "label":  evaluate4,
                                "value":  value4
                              },
                               
                            ]
                        }

                    });
                  revenueChart.render();
                  })
}
function countEvaluate(){
     $.ajax({
           type: "GET",
           url: "php/countEvaluate.php",
           cache: false,
           success: function(msg){
                var text=msg.split(",")

                $("span#qtyEvaluate").text(text[0])
                $("span#point").text(text[1])
                value1=parseInt(text[2])
                value2=parseInt(text[3])
                value3=parseInt(text[4])
                value4=parseInt(text[5])
                evaluate1=text[6]
                evaluate2=text[7]
                evaluate3=text[8]
                evaluate4=text[9]
           }
        });
}

$("a#details").click(function(){
  chart(value1,value2,value3,value4,evaluate1,evaluate2,evaluate3,evaluate4)
})

</script>

</html>

   