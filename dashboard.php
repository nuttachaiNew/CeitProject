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
                  <a><i class="fa fa-list fa-lg"></i> เมนูผู้จัดการ <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                   <li  ><a href="authorize.php" >สถานะงานทั้งหมด</a></li>
                    <li ><a href="report.php">รายงานการดำเนินงาน</a></li>
                    <li  class="active"><a href="dashboard.php">Dashboard</a></li>
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
                         <li class="active">Dashboard</li>
                    </ol>
            </div>
  </div>  
 <div class="form-horizontal" style="margin-top:1%">
    
      <label class="col-sm-offset-3">ตั้งแต่</label>
      <input class="datepicker" type="text" id="dateFrom" /> <span class="fa fa-calendar fa-fw" id="test"></span>
      
      <label class="col-sm-offset-1">ถึง</label>
      <input class="datepicker" type="text" id="dateTo" /><span class="fa fa-calendar fa-fw"></span>
    <br/> <span class="col-sm-5" style="margin-top:1%"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button id="search" class="btn btn-primary"><i class="fa fa-search fa-md">ค้นหา</i></button>
 </div>
 <div class="form-horizontal" style="margin-top:1%">
     <div class="form-horizontal" style="margin-top:1%">
    
          <div class="col-sm-7 col-sm-offset-3">
            <div id="chartContainer"> </div>
          </div>

</div>
<div class="form-horizontal" style="margin-top:1%" id="taskBar">

<div class="col-sm-3" id="alertNewWork" style="margin-top:1%"> 
        <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-dashboard fa-fw"></i> Dashboard Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a  class="list-group-item"  id="indicators">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Indicators
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>
                                <a  class="list-group-item" id="completed">
                                    <i class="fa fa-tasks fa-fw"></i> Complete Task
                                    <span class="pull-right text-muted small"><em><span id="completed">0</span> Task</em>
                                    </span>
                                </a>
                                <a  class="list-group-item" id="working">
                                    <i class="fa fa-tasks fa-fw"></i> Working Task
                                    <span class="pull-right text-muted small"><em><span id="working">0</span> Task</em>
                                    </span>
                                </a>
                                <a  class="list-group-item" id="waiting">
                                    <i class="fa fa-tasks fa-fw"></i> Waiting Task
                                    <span class="pull-right text-muted small"><em><span id="waiting">0</span> Task</em>
                                    </span>
                                </a>
                                
                               
                            </div>
                            <!-- /.list-group -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
  </div>
 
</div>

</body>
<script src="js/event.js"></script>
<!-- <script src="js/seviceClient.js"></script>
 -->
<script type="text/javascript"> 
 var qtyComplete=0;
  var qtyWorking=0;
  var qtyApprove=0;
 // var revenueChart = new FusionCharts()
  // username = '<?php echo $_SESSION["UserID"] ;?>';

  // $(function(){
  //             $('.datepicker').datepicker()
              
  //         });

 $( document ).ready(function() {
    
  var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0); 
  
      var checkin = $('#dateFrom').datepicker({
      onRender: function(date) {
        // return date.valueOf() < now.valueOf() ? 'disabled' : '';
       }
      }).on('changeDate', function(ev) {
           if (ev.date.valueOf() > checkout.date.valueOf()) {
          var newDate = new Date(ev.date)
          newDate.setDate(newDate.getDate()+1 );
          checkout.setValue(newDate);
        }
         checkin.hide();
           // $('#recieveDate')[0].focus();
      }).data('datepicker');
      var checkout = $('#dateTo').datepicker({
          onRender: function(date) {
            // return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');

});

function qtyWorks(){
  var dateFrom=$("#dateFrom").val();
  var dateTo=$("#dateTo").val();
  // var status="working";
  // console.log("test")
  $.ajax({
           type: "GET",
           url: "php/countForChart.php",
           cache: false,
           data: "dateTo="+dateTo+"&dateFrom="+dateFrom,
           success: function(msg){
             var qty=msg.split(",")
              qtyComplete=parseInt(qty[0]);
              qtyWorking=parseInt(qty[1]);
              qtyApprove=parseInt(qty[2]);

              chart(qtyComplete,qtyWorking,qtyApprove);
              $("span#completed").text(qtyComplete)
              $("span#working").text(qtyWorking)
              $("span#waiting").text(qtyApprove)
           }
        });

}


$("#search").click(function(){
  qtyWorks()
   tableComplete()
   tableWorking()
  tableWaiting()
   indicator()
}); 


function indicator(){
    var dateFrom=$("#dateFrom").val();
    var dateTo=$("#dateTo").val();
$.ajax({
           type: "GET",
           url: "php/dashIndicator.php",
           cache: false,
           data: "dateTo="+dateTo+"&dateFrom="+dateFrom,
           success: function(msg){
                var value=msg.split(",");
                $("div#taskBar").append(value[0])
                getLoop(value[1])

              }
           });

// 
}
$("a#indicators").click(function(){
  // console.log("55")
      $("div#coms").hide()
      $("div#works").hide()
      $("div#waits").hide()
      $("div#inds").show()
})
$("a#completed").click(function(){
    // $("div#taskBar").empty()
    $("div#coms").show()
    $("div#works").hide()
      $("div#waits").hide()
        $("div#inds").hide()
})
$("a#waiting").click(function(){
   $("div#coms").hide()
   $("div#works").hide()
    $("div#waits").show()
      $("div#inds").hide()
})
$("a#working").click(function(){
   $("div#coms").hide()
   $("div#works").show()
    $("div#waits").hide()
      $("div#inds").hide()
})

function tableWaiting(){
  var dateFrom=$("#dateFrom").val();
    var dateTo=$("#dateTo").val();
  $.ajax({
           type: "GET",
           url: "php/dashWaiting.php",
           cache: false,
           data: "dateTo="+dateTo+"&dateFrom="+dateFrom,
           success: function(msg){
            // $("div#taskBar").empty()
                $("div#taskBar").append(msg)
               
              }
           });

}

function tableWorking(){
  var dateFrom=$("#dateFrom").val();
    var dateTo=$("#dateTo").val();
  $.ajax({
           type: "GET",
           url: "php/dashWorking.php",
           cache: false,
           data: "dateTo="+dateTo+"&dateFrom="+dateFrom,
           success: function(msg){
            // $("div#taskBar").empty()
                $("div#taskBar").append(msg)
               
              }
           });

}

function tableComplete(){
  var dateFrom=$("#dateFrom").val();
    var dateTo=$("#dateTo").val();
  $.ajax({
           type: "GET",
           url: "php/dashComplete.php",
           cache: false,
           data: "dateTo="+dateTo+"&dateFrom="+dateFrom,
           success: function(msg){

            // $("div#taskBar").empty()
                $("div#taskBar").append(msg)
               
              }
           });

}
function chart(c,w,a){
  // console.log(qtyComplete)
   FusionCharts.ready(function(){
                      var revenueChart = new FusionCharts({
                          "type": "column2d",
                          "renderAt": "chartContainer",
                          "width": "500",
                          "height": "300",
                          "dataFormat": "json",
                          "dataSource":  {
                            "chart": {
                              "caption": "ศูนย์นวัตกรรม",
                              "subCaption": "ข้อมูลงานที่ปฏิบัติ",
                              "xAxisName": "สถานะงาน",
                              "yAxisName": "จำนวน",
                              "theme": "zune"
                           },
                           "data": [
                              {
                                 "label": "งานที่สำเร็จแล้ว",
                                 "value": c
                              },
                              {
                                 "label": "งานที่กำลังดำเนินการ",
                                 "value": w
                              },
                              {
                                "label": "งานที่รอดำเนินการ",
                                "value":  a
                              }
                            ]
                        }

                    });
                  revenueChart.render();
                  })
}

function getLoop(count){
  var loop=parseInt(count);
    var dateFrom=$("#dateFrom").val();
    var dateTo=$("#dateTo").val();
  var j=0;
  for(i=1;i<=loop;i++){      
    $.ajax({
           type: "GET",
           url: "php/indVal.php",
           cache: false,
           data: "indID="+i+"&dateFrom="+dateFrom+"&dateTo="+dateTo,
           success: function(msg){
           var text=msg.split(",")
                $('span#value'+text[1]).text(text[0])
      
           }
        });
 
  }
}
</script>

</html>

   