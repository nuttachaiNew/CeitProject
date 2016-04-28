<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">


<?php
    

    $username = $_POST["username"];
    $fname = $_POST["fullname"];
    $empcode = $_POST["employeecode"];
    $department = $_POST["department"];
    $telno = $_POST["telephone"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $pass = $_POST["password"];

    //$status = $_POST["status"];    
    // $position = $_POST["Position"];

    session_start();

    include("php/config.php");  

    // mysql_connect("localhost","root","1234");
    // mysql_select_db("ceit_service");
    // mysql_query("SET NAMES UTF8");

    
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

    // if(trim($_POST["Position"]) == "")
    // {
    //     echo "<script>alert('กรุณากรอกตำแหน่ง!');</script>";
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
        
    // if($_POST["password"] != $_POST["password1"])
    // {        
    //     echo "<script>alert('Password ไม่ตรงกัน กรุณากรอกใหม่!');</script>";
    //     echo "<script>window.history.back();</script>"; 
    //     exit();
    // }
    
    
    
    // $strSQL = "SELECT * FROM user WHERE username = '".trim($_POST['username'])."' ";
    // $objQuery = mysql_query($strSQL);
    // $objResult = mysql_fetch_array($objQuery);
    
    // if($objResult)
    // {
    //         //echo "Username already exists!";
    //     echo "<script>alert('Username นี้ถูกใช้แล้ว กรุณากรอกใหม่!');</script>";
    //     echo "<script>window.history.back();</script>"; 
    //     exit();
    // }
    // else
    // {   

        
        $strSQL = "UPDATE user
                   SET  name =  '$fname',
                        employee_id = '$empcode',
                        department = '$department',
                        telno = '$telno',
                        phone = '$phone',
                        email = '$email',                        
                        password ='$pass'
                   WHERE username = '".$username."' ";                   
        $objQuery = mysqli_query($Connection,$strSQL);

     

        
        echo "<script>alert('แก้ไขข้อมูลลูกค้าสำเร็จ!');</script>";  
        echo "<script>location.href='userdetail.php';</script>"; 
           
        // echo "<br> Go to <a href='Login.html'>Login page</a>";
        
    // }

    mysqli_close();
?>
</head>
</html>
