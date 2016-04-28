<?php
		include("config.php");
$user=$_GET['username'];
$value1=$_GET['value1']*2;
$value2=$_GET['value2']*2;
$value3=$_GET['value3']*2;
$value4=$_GET['value4']*2;


$totolPoint=number_format(($value1+$value2+$value3+$value4)/4, 2);
$count;
  $sql = mysqli_query($Connection,"SELECT count(*) as total FROM evaluateTools  WHERE user LIKE '".$user."' ");
  $data=mysqli_fetch_assoc($sql);
  $count= $data['total'];

  echo $count;
if($count==1){
	echo "y";
	$strSQL = "UPDATE evaluateTools SET ";
	$strSQL .="totalPoint ='".$totolPoint."'";
	$strSQL .=",value1 ='".$value1."'";
	$strSQL .=",value2 ='".$value2."'";
	$strSQL .=",value3 ='".$value3."'";
	$strSQL .=",value4 ='".$value4."'";
	$strSQL .="WHERE user = '".$user."' ";
	$objQuery = mysqli_query($Connection,$strSQL);


}else if($count==0){
	echo "n";
$strSQL = "INSERT INTO evaluateTools ";
			$strSQL .="(user,totalPoint,value1,value2,value3,value4) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$user."','".$totolPoint."' ";
			$strSQL .=",'".$value1."' ";
			$strSQL .=",'".$value2."'";
			$strSQL .=",'".$value3."' ";
			$strSQL .=",'".$value4."') ";
			$objQuery = mysqli_query($Connection,$strSQL);

}


?>