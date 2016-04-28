<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">


<?php

    $status = "User";

    // session_start();
    // mysql_connect("localhost","root","1234");
    // mysql_select_db("ceit_service");
    // mysql_query("SET NAMES UTF8");

    include("php/config.php"); 
    
    // if(trim($_POST["fullname"]) == "")
    // {
    //     echo "<script>alert('กรุณากรอกชื่อ-นามสกุล!');</script>";
    //     echo "<script>window.history.back();</script>";        
    //     exit(); 
    // }
    
    // if(trim($_POST["employeecode"]) == "")
    // {
    //     echo "<script>alert('กรุณากรอกรหัสพนักงาน!');</script>";
    //     echo "<script>window.history.back();</script>"; 
    //     exit(); 
    // }

    //  if(trim($_POST["department"]) == "")
    // {
    //     echo "<script>alert('กรุณาเลือกหน่วยงาน!');</script>";
    //     echo "<script>window.history.back();</script>"; 
    //     exit(); 
    // } 

    //  if(trim($_POST["telephone"]) == "")
    // {
    //     echo "<script>alert('กรุณากรอกหมายเลขโทรศัพท์!');</script>";
    //     echo "<script>window.history.back();</script>"; 
    //     exit(); 
    // }   

    //  if(trim($_POST["email"]) == "")
    // {
    //     echo "<script>alert('กรุณากรอกที่อยู่อีเมล!');</script>";
    //     echo "<script>window.history.back();</script>"; 
    //     exit(); 
    // }   
    
    //  if(trim($_POST["username"]) == "")
    // {
    //     echo "<script>alert('กรุณากรอก Username!');</script>";
    //     echo "<script>window.history.back();</script>"; 
    //     exit(); 
    // }        
        
    if($_POST["password"] != $_POST["password1"])
    {        
        echo "<script>alert('Password ไม่ตรงกัน กรุณากรอกใหม่!');</script>";
        echo "<script>window.history.back();</script>"; 
        exit();
    }
    
    
    
    $strSQL = "SELECT * FROM user WHERE username = '".trim($_POST['username'])."' ";
    $objQuery = mysqli_query($Connection,$strSQL);
    $objResult = mysqli_fetch_array($objQuery);
    if($objResult)
    {
            //echo "Username already exists!";
        echo "<script>alert('Username นี้ถูกใช้แล้ว กรุณากรอกใหม่!');</script>";
        echo "<script>window.history.back();</script>"; 
        exit();
    }
    else
    {   
        
        $strSQL = "INSERT INTO user (name,employee_id,department,telno,phone,email,status,username,password) 
                        VALUES ('".$_POST["fullname"]."','".$_POST["employeecode"]."','".$_POST["department"]."','".$_POST["telephone"]."','".$_POST["phone"]."','".$_POST["email"]."','".$status."','".$_POST["username"]."','".$_POST["password"]."')";
        $objQuery = mysqli_query($Connection,$strSQL);
        
        echo "<script>alert('สมัครสมาชิกเสร็จสิ้น กลับสู่หน้า Login!');</script>";  
        echo "<script>location.href='Login.html';</script>";         
    
        //echo "<br> Go to <a href='Login.html'>Login page</a>";
        
    }

    mysql_close();
?>
</head>
</html>
