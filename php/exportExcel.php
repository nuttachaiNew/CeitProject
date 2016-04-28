<?php
	session_start();
//คำสั่ง connect db เขียนเพิ่มเองนะ
include("config.php");
$strExcelFileName="departmentReport.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");

 		$status1='working';
        $status2='approve';
        $status3='complete';

if($_SESSION['type']=='department'){
  $sql = mysqli_query($Connection,"SELECT COUNT(department) as count, department FROM educationservice WHERE date >='".$_SESSION['dateFrom']."' AND date <='".$_SESSION['dateTo']."'  AND (serviceStatus = '".$status1."'  OR serviceStatus ='".$status2."' OR serviceStatus = '".$status3."' ) GROUP BY department ORDER BY count desc");
}else if($_SESSION['type']=='subject'){
  $sql = mysqli_query($Connection,"SELECT COUNT(subjectName) as count, subjectCode, subjectName FROM educationservice WHERE (subjectCode <> 'undefined' OR subjectCode <> '') AND (date >= '".$_SESSION['dateFrom']."' AND date <= '".$_SESSION['dateTo']."')  AND (serviceStatus = '".$status1."'  OR serviceStatus ='".$status2."' OR serviceStatus = '".$status3."' ) GROUP BY subjectName 
              ORDER BY COUNT(subjectName) DESC ");
}
$num=mysqli_num_rows($sql);
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php

if($_SESSION['type']=='department'){
echo  '<center><strong>รายงานหน่วยงานที่ขอใช้บริการ</strong> </center>';
echo '<center>ตั้งแต่ : '.$_SESSION['dateFrom'].' ถึง '.$_SESSION['dateTo'].'</center>';
echo  '<center>มีหน่วยงานที่ขอบริการทั้งหมด ' . number_format($num). ' หน่วยงาน </center><br>';

echo '<br>';
echo '<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">';
echo '<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">';
echo '<tr>';
echo '<td width="350" height="30" align="center" valign="middle" ><strong>หน่วยงานที่ขอใช้บริการ</strong></td>';
echo '<td width="100" align="center" valign="middle" ><strong>จำนวนการขอใช้บริการ</strong></td>';
echo '</tr>';
if($num>0){
while($row=mysqli_fetch_array($sql)){
	echo "<tr>";
	echo "<td align='left'>".$row["department"]."</td>";
    echo "<td align='center'>".$row["count"]."</td>";
    echo "</tr>";
	}
}
echo "</table>";
echo "</div>";


}else if($_SESSION['type']=='subject'){
	echo  '<center><strong>รายวิชาเรียนที่ขอใช้บริการ</strong> </center>';
echo '<center>ตั้งแต่ : '.$_SESSION['dateFrom'].' ถึง '.$_SESSION['dateTo'].'</center>';
echo  '<center>มีทั้งหมด ' . number_format($num). ' รายวิชา </center><br>';

echo '<br>';
echo '<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">';
echo '<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">';
echo '<tr>';
echo '<td width="150" align="center" valign="middle" ><strong>รหัสวิชาเรียน</strong></td>';
echo '<td width="350" height="30" align="center" valign="middle" ><strong>วิชาที่ขอใช้บริการ</strong></td>';
echo '<td width="100" align="center" valign="middle" ><strong>จำนวนการขอใช้บริการ</strong></td>';
echo '</tr>';
if($num>0){
while($row=mysqli_fetch_array($sql)){
	echo "<tr>";
	  echo "<td align='center'>".$row["subjectCode"]."</td>";
      echo "<td align='left'>".$row["subjectName"]."</td>";
       echo "<td align='center'>".$row["count"]."</td>";
                       
    echo "</tr>";
	}
}
echo "</table>";
echo "</div>";
}


?>



<script type="text/javascript">
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>
