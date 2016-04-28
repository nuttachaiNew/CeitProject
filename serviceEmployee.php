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
                  <a href="#">
                  <i class="fa fa-home fa-lg"></i> Home
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-list fa-lg"></i> CEIT Service <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li class="active" ><a href="#" >ขอใช้บริการผลิตสื่อโสตทัศน์</a></li>
                    <li><a href="#">อื่นๆ</a></li>
                </ul>
                 <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
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
                         <li class="active">Employee Notification</li>
                    </ol>
            </div>
	</div>	

<!-- container -->
<div class="form-horizontal" style="margin-top:2%">
    <div class="form-horizontal" style="margin-top:1%"/>
        <div class="col-sm-6" id="tableScrollingY">
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th class="th">หมายเลขงาน</th>
                      <th class="th">ลักษณะงาน</th>
                      <th class="th">งานประเภท</th>
                      <th class="th"></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
        </div>
        <div class="col-sm-6">
          <center>
          <h4 >ความคืบหน้าของงาน </h4>
          </center>
          <div class="row">
            <span class="col-sm-2">กำหนดส่ง :</span>
            <span class="col-sm-4">
              <input type="text" class="form-control" id="endDate" disabled="true" />
            </span>
          </div>
          <div class="row" style="margin-top:1%;">
            <span class="col-sm-2">ผู้รับงาน :</span>
             <span class="col-sm-7">
              <input type="text" class="form-control" id="clientName" disabled="true" />
            </span>
          </div>
          <div class="row" style="margin-top:1%;">
            <span class="col-sm-2">อยู่ในขั้นตอน</span>
             <span class="col-sm-8">
              <input type="text" class="form-control" id="taskProcess"/>
            </span>
          </div>
          <div class="row" style="margin-top:1%;">
            <span class="col-sm-2">สำเร็จแล้ว :</span>
             <span class="col-sm-2">
              <input type="text" class="form-control" id="progress"  />
            </span>
            <span class="col-sm-1">%</span>
          </div>
           <div class="row" style="margin-top:5%;">
                <center> <button class="btn btn-success">บันทึกความก้าวหน้า</button></center>
           </div>
        </div>
        
</div>   <!--container -->
</div>
<!-- modal -->

<div class="modal fade" id="addDetailModal" name="Add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <h4 class="modal-title">แบบขอใช้บริการผลิตสื่อโสตทัศน์</h4>
                </div>
                <div class="modal-body border">
                    <!--===============================================-->
                    <div class="row">
                        <div class="form-horizontal col-sm-12">
                        	<div class="form-group">
                        		<div class="col-sm-4"></div>
                        		<label class="col-sm-2">วันที่ต้องการ :</label> 
                        		<!-- datepicker -->
                        			<input class="datepicker" type="text" id="date" />
                        	</div>
                        	<div class="form-group">
                        		<div class="col-sm-4"></div>
                        		<label class="col-sm-2">เวลา :</label> 
                        	
                        			<span class="col-sm-2"><input class="form-control" type="text" id="time" maxlength="5" /></span>
                        		<label class="col-sm-2">น.</label>
                        	</div>
                        	<div class="form-group">
                        		<div class="col-sm-4"></div>
                        		<label class="col-sm-2">สถานที่ :</label> 
                        	
                        			<span class="col-sm-4"><input class="form-control" type="text" id="location" /></span>
                        		
                        	</div>

                           <div class="form-group">
                           		<div class="col-sm-4"></div>
	                        	<label>ลักษณะงาน : </label>&nbsp;&nbsp;&nbsp;&nbsp;

	                        	<select id="addType">
	                        		<option value="0">กรุณาเลือกประเภท</option>
	                        		<option value="education">เพื่อการเรียนการสอน</option>
	                        		<option value="publicRelation">เพื่อการประชาสัมพันธ์</option>
	                        	</select>&nbsp;&nbsp;&nbsp;
                        	</div>
                        </div>
                        <div class="form-horizontal col-sm-12" id="serviceDetail">

                        </div>

                    </div>
                </div>
                <div class="modal-footer border">
                    <center>
                    	<label>ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</label><br/>
                    	<label>โทรศัพท์ : 0-4422-4994 โทรสาร : 0-4422-4974</label><br/>
                    	<label><a href="http://ceit.sut.ac.th">ceit.sut.ac.th</a></label><br/>
                    <br/>    <button id="addDataDetail" type="button" data-toggle="popover" data-content="${MSG_REQUIRE}" class="btn btn-sm btn-primary">เพิ่มบริการ</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    </center>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal-->

 
    <div id="resultModal" aria-hidden="true" aria-labelledby="mySmallModalLabel" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!--<div class="modal-header">
                    <label>${}</label>
                </div>-->
                <div class="modal-body">
                    <div style="cursor:default">
                        <center><label id="message">เพิ่มบริการสำเร็จ</label></center>
                    </div>
                </div>
                <div class="modal-footer border">
                    <center><button  class="btn btn-success" style="margin:10px" data-dismiss="modal" id="confirm" >ตกลง</button>
                    </center>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
<script src="js/event.js"></script>
<script src="js/seviceClient.js"></script>

<script type="text/javascript">
  username = '<?php echo $_SESSION["UserID"] ;?>';
  

  // var xmlHttp = new XMLHttpRequest();
  //   xmlHttp.open("POST","php/newWork.php",false);
  //   param="id="+username;
  //   xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //   xmlHttp.setRequestHeader("Content-length", param.length);
  //   xmlHttp.setRequestHeader("Connection", "close");
  //   xmlHttp.send(param);
   
  //   var qty =parseInt(xmlHttp.responseText);
  //   if(qty<0){
  //       $("#alertNewWork").hide()     
  //   }else{
  //       $("#alertNewWork").show()         
  //   }

  //   $(".newwork").text(qty);

</script>

</html>

   