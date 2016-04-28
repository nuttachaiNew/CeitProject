<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">


<?php
    

    $indid = $_POST["indicatorID"];
    $indname = $_POST["indicatorname"];
    // $empcode = $_POST["employeecode"];
    // $department = $_POST["department"];
    // $telno = $_POST["telephone"];
    // $email = $_POST["email"];
    // $status = $_POST["status"];
    // $pass = $_POST["password"];
    // $position = $_POST["Position"];



    session_start();
    // mysql_connect("localhost","root","1234");
    // mysql_select_db("ceit_service");
    // mysql_query("SET NAMES UTF8");
    
    
    // $strSQL = "SELECT * FROM indicators WHERE username = '".trim($_POST['username'])."' ";
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
        include("php/config.php");   
        
        $strSQL = "UPDATE indicators
                   SET  indicatorName =  ' $indname'                        
                   WHERE indicatorID = '".$indid."' ";                   
        $objQuery = mysqli_query($Connection,$strSQL);



        // $strSQL = "UPDATE employee
        //            SET  empName =  '$fname',                        
        //                 empPosition = '$position'                        
        //            WHERE empID = '".$_SESSION['EditID']."' ";                   
        // $objQuery = mysql_query($strSQL);


        

        
        echo "<script>alert('แก้ไขข้อมูลตัวชี้วัดสำเร็จ!');</script>";  
        echo "<script>location.href='indicatorsdetail.php';</script>"; 
           
        // echo "<br> Go to <a href='Login.html'>Login page</a>";
        
    // }

    mysqli_close($Connection);
?>
</head>
</html>
