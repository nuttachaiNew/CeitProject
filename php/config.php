<?php
$Hostname="127.0.0.1";
$Username="prj58_g05";
$Password="253279";
$Database="prj58_g05";
$Connection=mysqli_connect($Hostname,$Username,$Password) or die("ติดต่อฐานข้อมูลไม่ได้    ");
mysqli_select_db($Connection,$Database) or die ("เลือกฐานข้อมูลไม่ได้");
mysqli_query($Connection,"Set names utf8");
mysqli_query($Connection,"SET character_set_results=utf8");
mysqli_query($Connection,"SET character_set_client='utf8' ");
mysqli_query($Connection,"SET character_set_connection='utf8' ");
?>