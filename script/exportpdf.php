

<?php
// require ('connect.php');
require_once('mpdf/mpdf.php');
ob_start();
?>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

<style type="text/css">
<!--
@page rotated { size: landscape; }
.style1 {
	font-family: "TH SarabunPSK";
	font-size: 18pt;
	font-weight: bold;
}
.style2 {
	font-family: "TH SarabunPSK";
	font-size: 16pt;
	font-weight: bold;
}
.style3 {
	font-family: "TH SarabunPSK";
	font-size: 16pt;
	
}
.style5 {cursor: hand; font-weight: normal; color: #000000;}
.style9 {font-family: Tahoma; font-size: 12px; }
.style11 {font-size: 12px}
.style13 {font-size: 9}
.style16 {font-size: 9; font-weight: bold; }
.style17 {font-size: 12px; font-weight: bold; }
-->
</style>

<?php

  
  session_start();
 
  $serid=$_SESSION['Serviceid'];
  
  $conn = mysql_connect("localhost","root","1234");
    mysql_query("Set names utf8");
    mysql_query("SET character_set_results=utf8");
    mysql_query("SET character_set_client='utf8' ");
    mysql_query("SET character_set_connection='utf8' ");
  if (!$conn) {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("ceit_service", $conn);
  $result = mysql_query("SELECT * FROM educationservice WHERE serviceID LIKE '".$serid."'" );
  while($row = mysql_fetch_array($result)) {
    

    // echo $row['username'] . ",";
    // echo $row['serviceLocation']  . ",";
    // echo $row['serviceStatus'];


    $_SESSION['username']=$row['username'];
    $_SESSION['date']=$row['date'];
    $_SESSION['time']=$row['time'];
    $_SESSION['serviceLocation']=$row['serviceLocation'];



  }


  mysql_select_db("ceit_service", $conn);
  $result = mysql_query("SELECT * FROM user WHERE username LIKE '".$_SESSION['username']."'" );
  while($row = mysql_fetch_array($result)) {
    

    // echo $row['name'];
    // echo $row['employee_id'];
    // echo $row['department'];
    // echo $row['telno'];
    // echo $row['email'];


    $_SESSION['name']=$row['name'];
    $_SESSION['employee_id']=$row['employee_id'];
    $_SESSION['department']=$row['department'];
    $_SESSION['telno']=$row['telno'];
    $_SESSION['email']=$row['email'];

      

  // SELECT *  FROM 
 //          TABLE_USER INNER JOIN TABLE_SALARY 
 //           ON  TABLE_USER.id = TABLE_SALARY.id  ";


  // mysql_select_db("ceit_service", $conn);
  // $result = mysql_query("SELECT * FROM TABLE_educationservice INNER JOIN TABLE_user ON 'TABLE_educationservice.username' = 'TABLE_user.username'  
  //            WHERE serviceID LIKE '".$serid."'" );
  // while($row = mysql_fetch_array($result)) {
    

  //  echo $row['username'] . ",";
  //  echo $row['name'] . ",";
  //  echo $row['employee_id'] . ",";
  //  echo $row['department'] . ",";
  //  echo $row['telno'] . ",";
  //  echo $row['email'] . ",";
  //  echo $row['serviceLocation']  . ",";
  //  echo $row['serviceStatus'];



    
  }
  mysql_close($conn);

?> 






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
</head>
<body>
<div class=Section2>
<form method="post" action="#">
<!-- <table width="704" border="1" align="center" cellpadding="0" cellspacing="0" >
<td>
		<tr>
	 		<td> <img src="images/logo.png" width="100" height="100"></td>
		</tr>



</td>

<td>

		<tr>  
			<td width="291" align="center"><span class="style2">แบบขอใช้บริการผลิตสื่โสตทัศน์</span></td>
		</tr>
		<tr> 	
		    <td height="27" align="center"><span class="style2">ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</span></td>
		</tr>
		<tr> 		
		    <td height="25" align="center"><span class="style2">โทรศัพท์ : 0-4422-4994		โทรสาร : 0-4422-4974</span></td>
		</tr>
		<tr>
		    <td height="25" align="center"><span class="style2">http://ceit.sut.ac.th/</span></td>
		</tr>

</td>

</table> -->


<table border="0" cellpadding="0" cellspacing="0" width="200" height="30">
       <tr> 
              <td rowspan="5" width="200" align="center"><img src="images/logo.png" width="100" height="100"></td>
             
       </tr>
       <tr> 
              
              <td align="center" height="25">แบบขอใช้บริการผลิตสื่อโสตทัศน์</td>
       </tr>
       <tr> 
              <td  align="center" height="25">ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา</td>
       </tr>
       <tr> 
              <td align="center" height="25">โทรศัพท์ : 0-4422-4994		โทรสาร : 0-4422-4974</td>
       </tr>
       <tr>
       		  <td align="center" height="25">http://ceit.sut.ac.th/</td>
       		 
       </tr>

  </table>






<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" width="800">_________________________________________________________________________________________________________</td>
    </tr>
  </tbody>
</table>


<!-- <table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" >&nbsp;</td>
    </tr>
  </tbody>
</table> -->

<table width="230" border="0"  border="1" class="style2" cellpadding="0" cellspacing="0" bgcolor="#D5D5D5">
  <tbody>
    <tr>
      <td align="center" height="35">ส่วนที่ 1 : สำหรับผู้ขอใช้บริการ</td>     
    </tr>
  </tbody>
</table>

<table border="0"  border="0" class="style2" cellpadding="0" cellspacing="0" 	>
  <tbody>
    <tr>
      <td height="35">ชื่อ-นามสกุล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php session_start(); echo $_SESSION['name'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        รหัสพนักงาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php session_start(); echo $_SESSION['employee_id'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        หน่วยงาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php session_start(); echo $_SESSION['department'] ?> </td>       
    </tr>
     <tr>
      <td height="30">โทรศัพท์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php session_start(); echo $_SESSION['telno'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        มือถือ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php session_start(); echo $_SESSION['telno'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php session_start(); echo $_SESSION['email'] ?></td>

    </tr>
     <tr>
      <td height="30">ต้องการขอใช้บริการสื่อโสตทัศน์ในวันที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php session_start(); echo $_SESSION['date'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        เวลา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php session_start(); echo $_SESSION['time'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        สถานที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php session_start(); echo $_SESSION['serviceLocation'] ?></td> 
    </tr>
    <tr>
      <td height="30">ต้องการรับผลงานในวันที่....................................................................................................................................................................</td><br>
    </tr>
  </tbody>
</table>


<table width="800" border="1" class="style2" cellpadding="0" cellspacing="0" bgcolor="#D5D5D5">
  <tbody>
    <tr>
      <td align="center" height="50">
      	เพื่อการเรียนการสอน<br>
      	รหัสวิชา..........ชื่อวิชา......................
      </td>
      <td align="center" height="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เพื่อการประชาสัมพันธ์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><br>     
    </tr>
  </tbody>
</table><br>

<table width="800" border="0" class="style2" cellpadding="0" cellspacing="0" >
  <tbody>
    <tr>
      <td height="50">

      	<input type="checkbox" name="Learn"> ประกอบบทเรียน </input><br><br>
      	<input type="checkbox" name="Learn"> บันทึกการสอนในห้องเรียน* ขนาด 300 ที่นั่งขึ้นไป </input><br><br>
      	<input type="checkbox" name="Learn"> สื่อเสียง </input><br><br>
      	<input type="checkbox" name="Learn"> ภาพนิ่ง </input><br><br>
      	<input type="checkbox" name="Learn"> สำเนาสื่อ จำนวน.........แผ่น </input><br><br>
      	<u>หมายเหตุ</u> <br><br>
      	*ผู้ขอใช้ต้องแจ้งความประสงค์ล่วงหน้า 5 วัน <br><br>
      	*แนบฟอร์ม M-01, M-02
         
      </td>
      <td height="50">

      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> สื่อวิดิทัศน์** </input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> สื่อเสียง </input><br><br>
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ความยาวน้อยกว่า 1 นาที &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </input><br><br>
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ความยาว 1 - 15 นาที </input><br><br>
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ความยาว 5 - 15 นาที </input><br><br>
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ข่าว* </input><br><br>
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> ภาพนิ่ง* </input><br><br>
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Learn"> สำเนาสื่อ จำนวน.........แผ่น </input><br><br>
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         

      </td>
    </tr>
  </tbody>
</table>

<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" width="800">_________________________________________________________________________________________________________</td>
    </tr>
  </tbody>
</table>


<table width="800" border="0" >
  <tbody>
    <tr>
      <td height="30"><input type="checkbox" name="Learn"> งานส่วนตัว/งานภายนอก (ผู้ขอใช้บริการเป็นผู้ชำระเงิน) </input></td><br>
    </tr>
    <tr>
      <td height="30">ลักษณะงานที่ต้องการโดยสังเขป : ..................................................................................................................</td><br>
    </tr>
    <tr>
      <td height="30">.....................................................................................................................................................................</td><br>
    </tr>
  </tbody>
</table><br>

<table border="0"  border="0" class="style2" cellpadding="0" cellspacing="0"  >
  <tbody>
    <tr>
      <td height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ................................ผู้ขอใช้บริการ
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ................................ผู้รับรอง</td>       
    </tr>
     <tr>
      <td height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(..........................................)
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(..........................................)</td>
    </tr>
     <tr>
      <td height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............/................/..............
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หัวหน้าหน่วยงาน(คณบดีหรือเทียบเท่า)</td>
    </tr>
    <tr>
      <td height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............/................/..............</td><br>
    </tr>
  </tbody>
</table>

<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td align="center" width="800">_________________________________________________________________________________________________________</td>
    </tr>
  </tbody>
</table>







<!-- <table bordercolor="#424242" width="1141" height="78" border="1"  align="center" cellpadding="0" cellspacing="0" class="style3">
  <tr align="center">
    <td width="44" height="23" align="center" bgcolor="#D5D5D5"><strong>ลำดับ</strong></td>
    <td width="178" align="center" bgcolor="#D5D5D5"><strong>งบประมาณประจำปี
      <?php  $year; ?>
    </strong></td>
    <td width="123" align="center" bgcolor="#D5D5D5"><strong>งบที่ได้รับจัดสรร</strong></td>
    <td width="155" align="center" bgcolor="#D5D5D5"><strong>เงินคงเหลือในปัจจุบัน</strong></td>
    <td width="139" align="center" bgcolor="#D5D5D5"><strong>ไตรมาสที่ 1</strong></td>
    <td width="114" align="center" bgcolor="#D5D5D5"><strong>ไตรมาสที่ 2</strong></td>
    <td width="103" align="center" bgcolor="#D5D5D5"><strong>ไตรมาสที่ 3</strong></td>
    <td width="104" align="center" bgcolor="#D5D5D5"><strong>ไตรมาสที่ 4</strong></td>
    <td width="161" align="center" bgcolor="#D5D5D5"><strong>หมายเหตุ</strong></td>
    </tr>
   
    
<?php
$sql11 =  "select * from tbbudgetyear where  BudgetyearID = ".$_POST['year']." "; 
$objQuery11 = mysql_query($sql11);
while($row11 = mysql_fetch_array($objQuery11)) 

{
	$nest = $row11['Budgetyear'];
		}
	?>
    <?php
$yeareng  = $nest - 543 ; 
$yeareng2 = $yeareng-1;


// $qr="SELECT tbclearbill.BudgettypeID,tbbudgettype.Budgettype AS cat, tbbudgetcategory.Budgetcategoryamount AS ton,
// tbbudgetcategory.Budgetcategoryamount
// -
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng2-10-1' AND '$yeareng2-12-31') )
// -
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-01-1' AND '$yeareng-03-31') )
// -
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-04-1' AND  '$yeareng-06-30') )
// -
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-07-1' AND '$yeareng2-09-30')) AS de,

// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng2-10-1' AND   '$yeareng2-12-31'  )) AS t1,
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-01-1' AND   '$yeareng-03-31' )) AS t2,   
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-04-1' AND   '$yeareng-06-30' )) AS t3,   
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-07-1' AND   '$yeareng-09-30' )) AS t4
// FROM  tbclearbill,tbbudgetcategory,tbbudgettype,tbbudgetyear
// where tbbudgetcategory.BudgettypeID = tbclearbill.BudgettypeID AND tbbudgetcategory.BudgettypeID = tbbudgettype.BudgettypeID AND
//  tbclearbill.BudgetyearID = tbbudgetcategory.BudgetyearID AND tbclearbill.BudgetyearID = ".$_POST['year']."
// GROUP by tbclearbill.BudgettypeID";
// $qr1 = mysql_query($qr);
// $i = 1;
while($rerow = mysql_fetch_array($qr1)) 
{
	?>
  <tr>
    <td height="22" align="center"><?php echo $i;?></td>
    <td align="right" class="style3"><?php echo $rerow['cat'];?></td>
    <td align="right" class="style3"><?php echo number_format($rerow['ton'],2); ?></td>
    <td align="right" class="style3"><?php echo number_format($rerow['de'],2); ?></td>
    <td align="right" class="style3"><?php echo number_format($rerow['t1'],2); ?></td>
    <td align="right" class="style3"><?php echo number_format($rerow['t2'],2); ?></td>
    <td align="right" class="style3"><?php echo number_format($rerow['t3'],2); ?></td>
    <td align="right" class="style3"><?php echo number_format($rerow['t4'],2); ?></td>
    <td align="center" class="style3"></td>
    </tr>
    
    <?php  $i++; } ?>
    <?php
$sql11 =  "select * from tbbudgetyear where  BudgetyearID = ".$_POST['year']." "; 
$objQuery11 = mysql_query($sql11);
while($row11 = mysql_fetch_array($objQuery11)) 

{
	$nest = $row11['Budgetyear'];
		}
	?>
    <?php
$yeareng  = $nest - 543 ; 
$yeareng2 = $yeareng-1;


// $qr="SELECT tbclearbill.BudgettypeID,tbbudgettype.Budgettype AS cat, tbbudgetcategory.Budgetcategoryamount AS ton,
// tbbudgetcategory.Budgetcategoryamount
// -
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng2-10-1' AND '$yeareng2-12-31') )
// -
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-01-1' AND '$yeareng-03-31') )
// -
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-04-1' AND  '$yeareng-06-30') )
// -
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-07-1' AND '$yeareng2-09-30')) AS de,

// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng2-10-1' AND   '$yeareng2-12-31'  )) AS t1,
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-01-1' AND   '$yeareng-03-31' )) AS t2,   
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-04-1' AND   '$yeareng-06-30' )) AS t3,   
// SUM( Clearbillpayer * ( Clearbilldate BETWEEN '$yeareng-07-1' AND   '$yeareng-09-30' )) AS t4
// FROM  tbclearbill,tbbudgetcategory,tbbudgettype,tbbudgetyear
// where tbbudgetcategory.BudgettypeID = tbclearbill.BudgettypeID AND tbbudgetcategory.BudgettypeID = tbbudgettype.BudgettypeID AND
//  tbclearbill.BudgetyearID = tbbudgetcategory.BudgetyearID AND tbclearbill.BudgetyearID = ".$_POST['year']."
// GROUP by tbclearbill.BudgettypeID";
// $qr1 = mysql_query($qr);
// $total = 0 ;
// $total1 = 0 ;
// $total2 = 0 ;
// $total3 = 0 ;
// $total4 = 0 ;
// $total5 = 0 ;
// while($rerow = mysql_fetch_array($qr1)) 
// {
//    				$total += $rerow['ton'] ;
// 				$total1 += $rerow['de'] ;
// 				$total2 += $rerow['t1'] ;
// 				$total3 += $rerow['t2'] ;
// 				$total4 += $rerow['t3'] ;
// 				$total5 += $rerow['t4'] ;
// }
?>
    
    
  <tr>
    <td height="23">&nbsp;</td>
    <td align="center" class="style3"><strong>รวม</strong></td>
    <td align="right" class="style3"><strong>
      <?php echo number_format($total,2); ?>
    </strong></td>
    <td align="right" class="style3"><strong>
      <?php echo number_format($total1,2); ?>
    </strong></td>
    <td align="right" class="style3"><strong>
      <?php echo number_format($total2,2); ?>
    </strong></td>
    <td align="right" class="style3"><strong>
      <?php echo number_format($total3,2); ?>
    </strong></td>
    <td align="right" class="style3"><strong>
      <?php echo number_format($total4,2); ?>
    </strong></td>
  
  	<td align="right" class="style3"><strong>
  	  <?php echo number_format($total5,2); ?>
  	</strong></td>
    


    <td class="style3">&nbsp;</td>
    </tr>
</table>
<table width="200" border="0">
  <tbody>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table> -->
<?php
 // $sql_name =  "SELECT * FROM tbmember where MemberID='".$_SESSION['UserID']."'";
 // $result_name = mysql_query($sql_name);
 // while ($row_name= mysql_fetch_array($result_name)) 
	// 		{ 
 // 				echo "ผู้รายงานข้อมูล" ," :". $row_name['Name'];
	// 		}
?>
</form>
</div>
</body>
</html>
<?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>     
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>