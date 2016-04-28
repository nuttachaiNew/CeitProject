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
                  <i class="fa fa-home fa-lg"></i> ตารางการทำงาน
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service" class="collapsed">
                  <a><i class="fa fa-list fa-lg"></i>เมนูผู้จัดการ  <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li  ><a href="authorize.php" >สถานะงานทั้งหมด</a></li>
                    <li><a href="report.php">รายงานการดำเนินงาน</a></li>
                    <li ><a href="dashboard.php" >Dashboard</a></li>
                    <li><a href="evaluateReport.php">ผลการประเมินการให้บริการ</a></li>
                    <li class="active"><a href="summary.php">สถิติการขอใช้งาน</a></li>
                    
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
                         <li class="active">สถิติการขอใช้บริการ</li>
                    </ol>
            </div>
  </div>  
  <div class="row" style="margin-top:3%">
  <label class="col-sm-offset-3 col-sm-1">ค้นหาจาก</label>
    <select class="form-horizontal col-sm-5" id="type" style="text-align:center;" >
        <option value="0">หน่วยงานที่ขอใช้งาน</option>
        <option value="1">วิชาที่ขอใช้งาน</option>
    </select>
    <div class="col-sm-6"></div>
  </div>
 <div class="row" style="margin-top:1%">
    
    &nbsp;&nbsp;&nbsp;&nbsp;  <label class="col-sm-offset-3">ตั้งแต่</label>
      <input class="datepicker" type="text" id="dateFrom" readonly="true"/> <span class="fa fa-calendar fa-fw" id="test"></span>
      
      <label class="col-sm-offset-1">ถึง</label>
      <input class="datepicker" type="text" id="dateTo" readonly="true" /><span class="fa fa-calendar fa-fw"></span>
 </div>
 <div class="col-sm-offset-5" style="margin-top:1%"><label class="col-sm-1">สูงสุด</label>  &nbsp;&nbsp;
 <select class="form-horizontal col-sm-1" id="qty">
   <option value="5">5</option>
   <option value="10">10</option>
   <option value="20">20</option>
 </select>
 <button id="search" class="btn btn-primary"><i class="fa fa-search fa-md">ค้นหา</i></button>
 <button id="excel" class="btn btn-success" style="display:none;"><i class="fa fa-file-excel-o fa-md" >Export to Excel</i></button>
 </div>


 <div class="row" id="queryArea" style="margin-top:1%">
   
 </div>



</body>
<script src="js/event.js"></script>
<!-- <script src="js/seviceClient.js"></script>
 -->
<script type="text/javascript"> 
 
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

$("#search").click(function(){

   if($("#dateFrom").val()=="" ||$("#dateTo").val()=="" ){
     alert("กรุณาเลือกช่วงเวลา")
   }else{

    if($("#type").val()=="0"){
    dept()
    }else if($("#type").val()=="1"){
    subject()
   }
   }
  $("#excel").show()
});

function dept(){
  var dateFrom=$("#dateFrom").val()
  var dateTo=$("#dateTo").val()
  var limit=$("#qty").val()
   $.ajax({
           type: "POST",
           url: "php/selectMaxDep.php",
           cache: false,
           data:"dateFrom="+dateFrom+"&dateTo="+dateTo+"&limit="+limit,
           success: function(msg){
              $("#queryArea").empty()
              $("#queryArea").append(msg)
           }
         })

}

function subject(){
  var dateFrom=$("#dateFrom").val()
  var dateTo=$("#dateTo").val()
  var limit=$("#qty").val()
 $.ajax({
           type: "POST",
           url: "php/selectMaxsubject.php",
           cache: false,
            data:"dateFrom="+dateFrom+"&dateTo="+dateTo+"&limit="+limit,
           success: function(msg){
              $("#queryArea").empty()
              $("#queryArea").append(msg)
           }
         })
}

$("#excel").click(function(){
  
  window.location.href='php/exportExcel.php'; 
})

</script>

</html>

   