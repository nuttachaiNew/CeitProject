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
    ?>



<style>
   .progress-pie-chart {
width:200px;
height: 200px;
border-radius: 50%;
background-color: #E5E5E5;
position: relative;
}
.progress-pie-chart.gt-50 {
background-color: #81CE97;
}

.ppc-progress {
content: "";
position: absolute;
border-radius: 50%;
left: calc(50% - 100px);
top: calc(50% - 100px);
width: 200px;
height: 200px;
clip: rect(0, 200px, 200px, 100px);
}
.ppc-progress .ppc-progress-fill {
content: "";
position: absolute;
border-radius: 50%;
left: calc(50% - 100px);
top: calc(50% - 100px);
width: 200px;
height: 200px;
clip: rect(0, 100px, 200px, 0);
background: #81CE97;
transform: rotate(60deg);
}
.gt-50 .ppc-progress {
clip: rect(0, 100px, 200px, 0);
}
.gt-50 .ppc-progress .ppc-progress-fill {
clip: rect(0, 200px, 200px, 100px);
background: #E5E5E5;
}

.ppc-percents {
content: "";
position: absolute;
border-radius: 50%;
left: calc(50% - 173.91304px/2);
top: calc(50% - 173.91304px/2);
width: 173.91304px;
height: 173.91304px;
background: #fff;
text-align: center;
display: table;
}
.ppc-percents span {
display: block;
font-size: 2.6em;
font-weight: bold;
color: #81CE97;
}

.pcc-percents-wrapper {
display: table-cell;
vertical-align: middle;
}

.progress-pie-chart {
margin: 50px auto 0;
}
</style>

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
                  <a >
                  <i class="fa fa-home fa-lg"></i> Home
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-list fa-lg"></i> CEIT Service <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li  ><a href="serviceClient.php" >ขอใช้บริการผลิตสื่อโสตทัศน์</a></li>
                     <li class="active"><a href="evaluateTools.php" >ประเมินความพึงพอใจในการให้บริการ</a></li>
                    <!-- <li><a href="#">อื่นๆ</a></li> -->
                </ul>
                 <li>
                  <a href="Profile.php">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="Login.html">
                  <i class="fa fa-power-off fa-lg"></i> Sign Out
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
                         <li class="active">Customer Tracking</li>
                    </ol>
            </div>
	</div>	

<!-- container -->
 


<div class="bar_container">
  <div id="main_container">
    <div id="pbar" class="progress-pie-chart" data-percent="0">
        <div class="ppc-progress">
            <div class="ppc-progress-fill"></div>
        </div>
    <div class="ppc-percents">
        <div class="pcc-percents-wrapper">
            <span>%</span>
        </div>
    </div>
    </div>

        <progress style="display: none" id="progress_bar" value="0" min="0" max="100"></progress>
  </div>
</div>
<div class="form-horizontal" id="rating" style="display:none;margin-top:1%;">
  <button id="ratting" class="btn btn-success" style="display:none;">ให้คะแนน</button>
        <div id="stars" class="starrr"></div>
      <div id="rate">  คุณให้คะแนนผลงาน <span id="points">0</span> ดาว </div>
</div>
<div class="form-horizon" id="tableScrollingY" style="margin-top:1%">
  <table class="table table-responsive">
    <thead>
      <tr>
        <th class="th">วัน เวลา</th>
        <th class="th">ความคืบหน้า</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $serviceID= $_GET['id'];
             include("php/config.php");
             $sql = mysqli_query($Connection,"SELECT t.progessDate,t.taskProcess FROM task t JOIN educationservice es ON t.serviceID=es.serviceID WHERE t.serviceID='".$serviceID."' ORDER BY t.progessDate DESC ");
            if($sql === FALSE) { 
                  die(mysqli_error()); // TODO: better error handling
           }

              while($row = mysqli_fetch_array($sql)){
              
                echo "<tr>";
                echo "<td style='text-align:center;'>".$row['progessDate']."</td>";
                 echo "<td style='text-align:left;'>".$row['taskProcess']."</td>";
                echo "</tr>";
              
          }
        ?>
    </tbody>
  </table>
</div>

</div>
<script src="js/event.js"></script>
<script src="js/star.js"></script>
</html>
<script type="text/javascript">
 $(document).ready(function() {
    getValue();
});


function getValue(){
    var id=window.location.search.split("=")[1];

        $.ajax({
           type: "GET",
           url: "php/getTask.php",
           cache: false,
           data: "id="+id,
           success: function(msg){
            var check=msg.split(",")
              // console.log(check[0] +" "+ check[1])
                  $('#progress_bar').val(check[0]);
                  max = $('#progress_bar').attr('max');
                  value = $('#progress_bar').val();
                  addValue = $('#progress_bar').val(value);

                  $('.progress-value').html(value + '%');
                  var $ppc = $('.progress-pie-chart'),
                  deg = 360 * value / 100;
                  if(value > 50){
                    $ppc.addClass('gt-50');
                  }else if(value<=50){
                      $ppc.addClass('gt');
                  }
                    // if (value > 50) {

                  $('.ppc-progress-fill').css('transform', 'rotate(' + deg + 'deg)');
                  $('.ppc-percents span').html(value + '%');          
                  
                  if(parseInt(check[0])==100){
                    $("div#rating").show()
                    // console.log("text")
                  }
                  if(parseInt(check[0])==100 && parseInt(check[1])==0){
                      $("button#ratting").show()
                    // $("div#rating").show()
                    // console.log("text")
                  }
                  if(parseInt(check[1])>0){
                      $("i#"+check[1]).click();
                  }

               }
        });
}

$("button#ratting").click(function(){
   var points=parseInt($("span#points").text());
   var id=window.location.search.split("=")[1];
   if(points==0){
    alert("กรุณาให้คะแนนด้วยครับ");
   }else{
    
    $.ajax({
           type: "GET",
           url: "php/rating.php",
           cache: false,
           data: "id="+id+"&rating="+points,
           success: function(msg){
             alert("ขอบคุณที่ใช้บริการศูนย์นวัตกรรมครับ");
              $("button#ratting").hide()
           }
         });
    
   }

});
</script>