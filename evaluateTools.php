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
      if(!isset($_SESSION["UserID"])){
          // echo "test";
          header("location:Login.html");
      }
    ?>
</head>
<body>



  <nav class="navbar navbar-default" style="background-color:#23282e; height:50px;" id="nav"  >
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
                    <li ><a href="serviceClient.php" >ขอใช้บริการผลิตสื่อโสตทัศน์</a></li>
                     <li class="active" ><a href="evaluateTools.php" >ประเมิณความพึงพอใจในการให้บริการ</a></li>
                    
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
                         <li class="active">ประเมินความพึงพอใจในการให้บริการ</li>
                    </ol>
            </div>
	</div>	

<!-- container -->
<div class="form-horizontal" style="margin-top:2%">
	     <div class="form-horizontal col-sm-8 col-sm-offset-2" style="margin-top:1%" id="tableScrollingY">
  <table class="table table-responsive">
    <thead>
      <tr>
        <th class="th" width="70%">รายการ</th>
        <th class="th">คะแนนที่ให้</th>
      </tr>
    </thead>
    <tbody id="dataGrid">
 
       <?php
            include("php/config.php");
             $sql = mysqli_query($Connection,"SELECT * FROM evaluate ORDER BY evaluateID asc");
             while($row = mysqli_fetch_array($sql)){
                echo "<tr>";
                echo "<td width='70%'>".$row['evaluateName']."</td>";
                echo "<td align='center'>";
                    echo "<select id=select".$row['evaluateID'].">";
                         echo "<option value='5'>มากที่สุด</option>";
                         echo "<option value='4'>มาก</option>";
                         echo "<option value='3'>ปานกลาง</option>";
                         echo "<option value='2'>น้อย</option>";
                         echo "<option value='1'>น้อยที่สุด</option>";
                    echo "</select>";
                echo "</td>";
                echo "</tr>";

             }

        ?>


        </tbody>
    </table>
        <div class="col-sm-offset-5">
        <button id="save" class="btn btn-success"><span class='fa fa-floppy-o'> บันทึกผล </span></button>
        </div>

  </div>
  </div>



</body>
<script src="js/event.js"></script>
<!-- <script src="js/seviceClient.js"></script> -->

<script type="text/javascript">
var value={};
  username = '<?php echo $_SESSION["UserID"] ;?>';
  $( document ).ready(function() {
      getEvaluateID()
      getSelectValue()
});


function getEvaluateID(){
    $.ajax({
           type: "GET",
           url: "php/getEvaluateID.php",
           cache: false,
           success: function(msg){
         
           }
        });
}

function getSelectValue(){
      $.ajax({
           type: "GET",
           url: "php/selectValue.php",
           cache: false,
           data:"user="+username ,
           success: function(msg){
                if(msg!=null || msg!=""){
                   var text =msg.split(",");
                   $("#select3").val(text[0]/2)
                   $("#select4").val(text[1]/2)
                   $("#select5").val(text[2]/2)
                   $("#select6").val(text[3]/2)
                }
           }
        });
}

function evaluate(){
   $.ajax({
           type: "GET",
           url: "php/evaluate.php",
           cache: false,
           data:"value1="+$("#select3").val()+"&value2="+$("#select4").val()+"&value3="+$("#select5").val()+"&value4="+$("#select6").val()+"&username="+username,
           success: function(msg){
                  alert("บันทึกการประเมินเรียบร้อย") 
           }
        });
}

$("#save").click(function(){
  evaluate()
})


</script>

</html>

   